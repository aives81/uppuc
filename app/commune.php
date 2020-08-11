<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commune extends Model
{
    //
    function entreprises(){
        return $this->hasMany('App\entreprise', 'comId');
    }
}
