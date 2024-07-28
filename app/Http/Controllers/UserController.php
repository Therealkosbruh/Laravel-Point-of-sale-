<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index(){
        return view("sing");
    }

    public function user_index(){ // change to show() and add validation to the different views
        return view("Users/user_profile");
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'last_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'patr' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|string|min:8|confirmed',
            'password' => 'required|string',
            // 'password_confirmation' => 'required|string|min:8',
            'password_confirmation' => '',
            'phone' => 'required|string|max:30',
            // 'img' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $user = new User();
        $user->last_name = $request->input('last_name');
        $user->name = $request->input('name');
        $user->patr = $request->input('patr');
        $user->login = $request->input('login');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone = $request->input('phone');
        // $user->img = $request->file('img')->store('public/images');
        $user->role = 'user';
        
        $user->save();
        
        return redirect()->route('user.authentification');
    }
}
