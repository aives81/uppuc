<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class entreprise extends Model
{
    //
    protected $fillable = [
            'entrepriseTitle',
            'entrepriseDescription',
            'catId',
            'entrepriseImgCourv',
            'comId',
            'entrepriseDispoActive',
            'descripPlaceEntreprise',
            'latEntreprise',
            'longEntreprise',
            'id',
            'entrepriseJourDispo',
            'entrepriseHeureDispo',
            'entrepriseSlug'
    ];

    function categorie(){
        return $this->belongsTo('App\categorie', 'catId');
    }

    function user(){
        return $this->belongsTo('App\User', 'id');
    }

    function commune(){
        return $this->belongsTo('App\commune', 'comId');
    }
}
