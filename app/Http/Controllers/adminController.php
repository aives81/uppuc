<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Utilities\MyUtilitiesClass;
use MercurySeries\Flashy\Flashy;

class adminController extends Controller
{
    public function index()
    {
        return view('userProfile.index');
    }

    public function allEntreprisesOfOwner()
    {
        return view('userProfile.allEntreprise');
    }
}
