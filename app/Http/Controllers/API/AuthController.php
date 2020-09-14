<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55|unique:users',
            'email' => 'email|required|unique:users',
            'username' => 'required|max:55',
            'password' => 'required|confirmed',
            'phone' => 'integer',
            'birthday' => 'date'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([ 'user' => $user, 'access_token' => $accessToken]);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);

    }

    //CRUD

    // Read - all or one
    public function getAllUser() {
        $users = User::get()->toJson(JSON_PRETTY_PRINT);
        return response($users, 200);
    }

    public function getUser($id) {
        if (User::where('id', $id)->exists()) {
            $user = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    }

    // Update
    public function updateUser(Request $request, $id) {
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->name = is_null($request->name) ? $user->name : $request->name;
            $user->phone = is_null($request->phone) ? $user->phone : $request->phone;
            $user->birthday = is_null($request->birthday) ? $user->birthday : $request->birthday;

            $user->save();

            return response()->json([
                "message" => "Updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "User not found"
            ], 404);

        }
    }

    // Delete
    public function deleteUser($id) {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();

            return response()->json([
                "message" => "User deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    }
}
