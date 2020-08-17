<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conteudo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','titulo', 'texto', 'image', 'link', 'data_link'
    ];

    // public function comentarios()
    // {
    //     return $this->hasMany('App\Conteudo');
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function curtidas(){
    //     return $this->belongsToMany('App\user','curtidas', 'conteudo_id', 'user_id');
    // }
}
