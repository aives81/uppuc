<?php

namespace App\Http\Controllers;

use App\image;
use Illuminate\Http\Request;

class imageController extends Controller
{
    //

    function store(Request $request)
    {
        $request->validate(['entreprise' => 'required']);

        for ($i = 0; $i<count($request->pictures); $i++)
        {
            $addPictures = new image([
                'libImg' => request('pictures')[$i]->store('imgEntreprise', 'public')
                ,'entrepriseId' => $request->entreprise
            ]);
            $addPictures->save();
        }
        $successMsg = "Wahoouuuu ! Votre entreprise est nickellllll !!";
        return back()->with('success', $successMsg);
    }
}
