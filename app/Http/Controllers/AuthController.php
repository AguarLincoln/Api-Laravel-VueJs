<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        $data = $request->only('email', 'password');
        
        $validacao = Validator::make($data, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string' 
        ]);
        
        
        if($validacao->fails()){
            return ['status'=> false, 'validacao' => true, 'erros' => $validacao->errors()];
        }
        
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
            $user = auth()->user();
            $user->token = $user->createToken($user->email)->accessToken;
            return ['status' => true, 'usuario' => $user];
        }else{
            return ['status' => false];
        }
    }
}
