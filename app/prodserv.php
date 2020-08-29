<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prodserv extends Model
{
    //
    protected $fillable = ['libProdServ', 'typeProdServ', 'prixProdServ', 'slugProdServ', 'imgProdServ', 'entrepriseId'];
}
