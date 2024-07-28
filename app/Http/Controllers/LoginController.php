<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only(['login', 'password']);
        $user = User::where('login', $credentials['login'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('pr_index');
                case 'user':
                    return redirect('pr_index');
                default:
                    return redirect()->route('user.authentification');
            }
        }else{
            return redirect()->back()->withErrors(['login' => 'Invalid credentials']);
        }
    }
}
