<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        User::create([
            'username' => request('username'),
            'name' => request('name'),
            'email' => request('email'),
            'role' => constants('user.role.player'),
            'avatar' => 'img/avatar/default.jpg',
            'password' => Hash::make(request('password')),
        ]);
        return response()->json([
            'message' => 'success'
        ]);
    }
}
