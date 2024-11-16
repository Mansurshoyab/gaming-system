<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserManagement\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {
        try {
            return response()->json([
                'message' => __('API Working')
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => __('Validation failed'),
                'errors' => $e->errors(),
            ], 403);
        } catch (\Exception $e) {
            return response()->json([
                'message' => __('An error occurred during login'),
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|string|email|unique:members|max:255',
                'phone' => 'required|string|unique:members|max:15',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $validated['username'] = 'user' . time();
            $validated['password'] = Hash::make($validated['password']);

            $member = Member::create($validated);

            return response()->json([
                'message' => 'Registration Successfull',
                'data' => $member,
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => __('Validation failed'),
                'errors' => $e->errors(),
            ], 403);
        } catch (\Exception $e) {
            return response()->json([
                'message' => __('An error occurred during login'),
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function logout() {}
}
