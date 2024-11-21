<?php

namespace App\Http\Controllers\Api;

use App\Events\MemberCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagement\MemberRequest;
use App\Models\UserManagement\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'identifier' => 'required',
                'password' => 'required',
            ]);
            $identifier = $request->input('identifier');
            $password = $request->input('password');
            $member = Member::where('username', $identifier)->orWhere('email', $identifier)->orWhere('phone', $identifier)->first();

            if (!$member || !Hash::check($password, $member->password)) {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
            $token = $member->createToken($member->username . ' token')->plainTextToken;
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'verified' => $member->verified,
                'token' => $token,
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => __('Validation failed'),
                'errors' => $e->errors(),
            ], 403);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => __('An error occurred during login'),
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function dataCheck(Request $request){

        $email = $request->email;

        $member = Member::where('email' , $email)->first();

        if ($member) {
            return response()->json([
                'success' => false,
                'message' => 'Email Already Exist',
            ]);
        }else{
            return response()->json([
                'success' => true,
                'message' => 'Email Is not exist',
            ]);
        }
    }

    public function register(MemberRequest $request)
    {
        try {
            $data = $request->validated();
            $data['username'] = 'member' . time();
            $data['password'] = Hash::make($data['password']);
            $member = Member::create($data);
            event(new MemberCreated($member));
            $token = $member->createToken($member->username . ' token')->plainTextToken;
            return response()->json([
                'success' => true,
                'message' => 'Registration Successfull',
                'token' => $token,
                'data' => $member,
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => __('Validation failed'),
                'errors' => $e->errors(),
            ], 403);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => __('An error occurred during login'),
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $user = Auth::guard('gamer')->user();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'You are not authenticated',
                ], 401);
            }

            if ($request->user('gamer')->currentAccessToken()) {
                $request->user('gamer')->currentAccessToken()->delete();
            }

            Auth::guard('gamer')->logout();

            return response()->json([
                'success' => true,
                'message' => 'Logout successful',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred during logout',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
