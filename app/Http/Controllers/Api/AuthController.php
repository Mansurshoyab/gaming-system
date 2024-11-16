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
        $data = [
            'firstname' => $request->firstname,
        ];
        return response()->json([
            'message' => 'Registration Successfull',
            'data' => $data,
        ], 200);
    }

    public function logout() {}
}
