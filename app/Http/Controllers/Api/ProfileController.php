<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserManagement\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data = [
            'firstname' => Auth::user()->firstname,
            'lastname' => Auth::user()->lastname,
            'username' => Auth::user()->username,
            'email' => Auth::user()->email,
            'phone' => Auth::user()->phone
        ];
        return response()->json([
            'success' => true,
            'message' => 'Profile Display',
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $auth = Auth::user();
        $member = Member::where('id', $auth->id)->first();

        $validation = $request->validate([
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'email' => ['required', 'string', 'max:100', 'min:5', 'unique:' . Member::class . ',email,' . $member->id],
            'phone' => ['required', 'string', 'max:19', 'min:5', 'unique:' . Member::class . ',phone,' . $member->id],
        ]);

        $member->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        $data = [
            'firstname' => $member->firstname,
            'lastname' => $member->lastname,
            'email' => $member->email,
            'phone' => $member->phone,
        ];
        return response()->json([
            'success' => true,
            'member' => $data,
            'message' => 'Profile update successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
