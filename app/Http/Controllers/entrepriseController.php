<?php

namespace App\Http\Controllers;

use App\entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function Composer\Autoload\includeFile;

class entrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allEntreprises = entreprise::all();
        //return view('allEntreprise', compact('allEntreprises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('userProfile.createEntreprise');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'categorie' => 'required',
            'img' => 'required|image|max:6000',
            'commune' => 'required',
            'descriptionEmplacement' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'user' => 'required'
        ]);

        $tabJourEnre = [];
        $cpte = 0;

        for ($i=0; $i <7 ; $i++) {

            if (isset($request->j[$i]) && !empty($request->j[$i])) {

                $tabJourEnre[$cpte] = trim(htmlspecialchars($request->j[$i]));
                $cpte++;
            }
        }

        $workingDays = implode("@", $tabJourEnre);

        $tabHeurOuvFerm = [];

        for ($i=0; $i <count($tabJourEnre); $i++) {

            $hO = "heureOuv".$tabJourEnre[$i];
            $hF = "heureFerm".$tabJourEnre[$i];
            $tabHeurOuvFerm[$i] = implode("@", array($request->$hO, $request->$hF));
        }

        $workingHours = implode("|", $tabHeurOuvFerm);

        $addEntreprise = new entreprise([
                'entrepriseTitle' => $request->title,
                'entrepriseDescription' => $request->description,
                'catId' => $request->categorie,
                'entrepriseImgCourv' => request('img')->store('imgEntreprise', 'public'),
                'comId' => $request->commune,
                'descripPlaceEntreprise' => $request->descriptionEmplacement,
                'latEntreprise' => $request->lat,
                'longEntreprise' => $request->lng,
                'id' => $request->user,
                'entrepriseJourDispo' => $workingDays,
                'entrepriseHeureDispo' => $workingHours,
                'entrepriseSlug' => str::slug($request->title),
            ]);

        $addEntreprise->save();

        //Modifier le message plutard pour afficher le nom de l'user connecté
        $successMsg = "Félicitation ! Votre entreprise a été enregistrée avec successss !!";
        return back()->with('success', $successMsg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
