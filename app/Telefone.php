<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = ['numero','contato_id'];

    public function contato()
    {
        return $this->belongsTo(Contato::class);
    }
}
