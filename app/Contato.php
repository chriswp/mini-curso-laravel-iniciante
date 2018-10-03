<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{

    protected $fillable = ['nome','email','user_id'];

    protected $hidden = ['id'];

    public function usuario(){
        return $this->belongsTo(User::class);
    }

    public function telefones(){
        return $this->hasMany(Telefone::class);
    }
}
