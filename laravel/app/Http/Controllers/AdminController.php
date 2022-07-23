<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function login(Request $request){
        $email=$request->email;
        $password=$request->password;
        $admin=Admin::where('email',$email)->first();
        if($admin) {
            if(Hash::check($password,$admin->password)){
                $admin->tokens()->delete();
                $token=$admin->createToken('Admin Token',['admin'])->plainTextToken;
                return response([
                    'token' => $token,
                    'admin'=>[
                        'name'=>$admin->name,
                        'email'=>$email,
                        'phone'=>$admin->phone,
                    ]
                ]);
            }
        }
        return response(['message'=>'Invalid password or account'],401);
    }
    function logout(Request $request) {
        $request->user()->tokens()->delete();
        return response(['message'=>'success']);
    }
    function show(){
        $admins=Admin::pluck('email','phone','phone')->orderBy('name')->paginate(20);
        return response(['admins'=>$admins]);
    }
}
