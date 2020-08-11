<?php


namespace App\Utilities;


use Illuminate\Support\Facades\Auth;

class MyUtilitiesClass
{

    public function userIsLogged()
    {
        return (!isset($userId)) ? redirect("/") : "";
    }
}
