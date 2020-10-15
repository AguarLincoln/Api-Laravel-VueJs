<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
    
        $validacao = Validator::make($data, [
            'name' =>  'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed' 
        ]);

        if(!isset($data['image'])){
            $data['image'] = 'data:image/png;base64,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';
        }
        
        if($validacao->fails()){
            return ['status'=> false, 'validacao' => true, 'erros' => $validacao->errors()];
        }
        
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        
        $user->token = $user->createToken($user->email)->accessToken;

        return ['status' => true, 'usuario' => $user];
    }

    public function amigo(Request $request){
        $user = $request->user();
        
        $amigo = User::find($request->id);
        
        if($amigo && ($user->id != $amigo->id)){
            $user->amigos()->toggle($amigo->id);
            return ['status' => true, 'amigos' => $user->amigos, 'seguidores' => $amigo->seguidores];
        }

        return ['status' => false, 'error' => 'usuario não existe'];
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = $request->user();
        $data = $request->all();
    
        if(isset($data['password'])){
            
            $validacao = Validator::make($data, [
                'password' => 'required|string|min:6|confirmed' 
            ]);
    
            if($validacao->fails()){
                return ['status'=> false, 'validacao' => true, 'erros' => $validacao->errors()];
            }
    
            $data['password'] = bcrypt($data['password']);
        }
    
        $validacao = Validator::make($data, [
            'name' =>  'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)], 
        ]);
        
        if($validacao->fails()){
            return ['status'=> false, 'validacao' => true, 'erros' => $validacao->errors()];
        }
        
       
        $user->update($data);
        $user->token = $user->createToken($user->email)->accessToken;
        return ['status' => true, 'usuario' => $user];
    
    }

    public function listaAmigos(Request $request){
        $user = $request->user();

        if($user){
            return ['status' => true, 'amigos' => $user->amigos, 'seguidores'=>$user->seguidores];
        }

        return ['status' => false, 'error' => 'Usuario não existe'];
        
    }

    public function listaAmigosPagina(Request $request, $id){
        $user = User::find($id);
        $userlogado = $request->user();
        if($user){
            return ['status' => true, 'amigos' => $user->amigos, 'amigosLogados' => $userlogado->amigos, 'seguidores'=>$user->seguidores];
        }

        return ['status' => false, 'error' => 'Usuario não existe'];
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
