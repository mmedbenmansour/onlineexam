<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function classes(){
        return $this->belongsToMany(Classe::class,'classe_etudiant');
    }
}
