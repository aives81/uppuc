<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    //
    function entreprises(){
        return $this->hasMany('App\entreprise', 'catId');
    }
}
