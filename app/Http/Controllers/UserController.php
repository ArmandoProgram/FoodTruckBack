<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return response($users);
    }

    public function getUser($id) {
        $user = User::find($id);
        if($user == null) {
            return response(['message' => 'user not found'], 404);
        }
        return response()->json($user);
    }

    public function newUser(Request $request){
        $user = User::create($request -> all());
        return response()->json($user);
    }

    public function updateUser(Request $request, $id) {
        $user = user::find($id);
        if($user == null) {
            return response(['message' => 'user not found'], 404);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return response($user);
    }
    public function destroyUser ($id) {
        $user = user::find($id);
        if($user == null) {
            return response(['message' => 'user not found'], 404);
        }
        $user->delete();
        return response(['message' => 'user deleted']);
    }
}
