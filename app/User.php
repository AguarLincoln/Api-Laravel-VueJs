<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'image', 'password', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // public function comentarios()
    // {
    //     return $this->hasMany(Comentario::class);
    // }

    public function conteudos()
    {
        return $this->hasMany(Conteudo::class);
    }

    public function amigos()
    {
      return $this->belongsToMany('App\User', 'amigos', 'user_id', 'amigo_id');
    }
    
    // public function curtidas(){
    //     return $this->belongsToMany('App\Conteudo', 'curtidas', 'user_id', 'conteudo_id');
    // }
}
