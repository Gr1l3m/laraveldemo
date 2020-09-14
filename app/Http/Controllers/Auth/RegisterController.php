<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
//    public function register(){
//        return view('auth.register');
//    }
//
//    public function store(Request $request){
//        $request -> validate([
//            'name' => 'required|string|max:150',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:8|confirmed',
//            'password_confirmation' => 'required',
//        ]);
//
////        User::create([
////            'name' => $request->name,
////            'email' => $request->email,
////            'password' => Hash::make($request->password),
////        ]);
//
//        $email = $request['email'];
//        $name = $request['name'];
//        $password = bcrypt($request['password']);
//
//        $user = new \App\Models\User();
//
//        $user->email = $email;
//        $user->name = $name;
//        $user->password = $password;
//
//        $user->save();
//
//        return redirect('login');
//
//
//    }
}
