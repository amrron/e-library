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

    public function update(User $user, Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email'
        ]);

        $user->update($data);

        return back()->with('status', 'success');
    }
}
