<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    public function register(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password)
        ]);

        if($user){
            return response()->json([
                'status' => 'Register sukses'
            ], 200);
        }
        else{
            return response()->json([
                'status' => 'Register gagal'
            ], 201);
        }
    }

    public function login(Request $request){
        $cek = User::where('email', $request->email)->first();
        if($cek){
            if(Hash::check($request->password, $cek->password)){
                return response()->json([
                    'status' => 'Berhasil Login',
                    'token' => $cek->createToken('users')->accessToken,
                    'data' => $cek
                ], 200);
            }
            else{
                return response()->json([
                    'status' => 'password salah'
                ], 400);
            }
        }
        else{
            return response()->json([
                'status' => 'tidak ada'
            ], 404);
        }
        return response()->json(['error'=>$cek], 401);
    }

    public function show(){
        $user = User::where('id', Auth()->user()->id)->first();
        if($user){
            return response()->json([
                'status' => 'success',
                'message' => 'Data User',
                'data' => $user
            ], 200);
        }
        else{
            return response()->json([
                'status' => 'gagal',
                'message' => 'Data user tidak ditemukan'
            ], 404);
        }
    }

    public function update(Request $request){
        $user = User::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat
        ]);

        if($user){
            return response()->json([
                'status' => 'Update user sukses'
            ], 200);
        }
        else{
            return response()->json([
                'status' => 'Update user gagal'
            ], 400);
        }
    }

    public function logoutApi()
    { 
        if (Auth::check()) {
            Auth::user()->AauthAcessToken()->delete();
            return response()->json([
                'status' => 'berhasil',
                'message' => 'Logout berhasil'
            ]);
        }
    }
}
