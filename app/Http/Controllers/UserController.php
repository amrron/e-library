<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::member()->get();

        return view('member', [
            'users' => $users
        ]);
    }

    public function show(User $user) {
        return response()->json([
            'status' => true,
            'data' => $user
        ], 201);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            // 'password' => 'required|string|min:8|confirmed',
        ]);

        $data['password'] = Hash::make($data['email']);

        $user = User::create($data);

        if ($user) {
            return back()->with('status', 'success');
        }

        return back()->with('status', 'failed');
    }

    public function update(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email'
        ]);

        $user = User::where('member_id', $request->member_id)->first();

        if ($user) {
            $user->update([
                'name' => $data['name'],
                'email' => $data['email']
            ]);
            
            return back()->with('status', 'success');
        }

        else  {
            return back()->with('status', 'failed');
        }

    }

    public function block(User $user) {
        $user->update([
            'status' => false
        ]);

        return response()->json([
            'status' => true,
            'data' => $user
        ], 201);
    }

    public function unblock(User $user) {
        $user->update([
            'status' => true
        ]);

        return response()->json([
            'status' => true,
            'data' => $user
        ], 201);
    }
}
