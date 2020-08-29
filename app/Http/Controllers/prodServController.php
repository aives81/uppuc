<?php

namespace App\Http\Controllers;

use App\prodserv;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function GuzzleHttp\Psr7\str;

class prodServController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
         * Voir plutqrd pourquoi le required dans le cas d'un envoi multiple plante
         *
         * $request->validate([
           'entreprise' => 'required',
           'designation' => 'required',
           'type' => 'required',
           'price' => 'required',
           'img' => 'required|image|max:6000'
        ]);*/

        $request->validate([
           'entreprise' => 'required',
           'designation' => 'required',
           'type' => 'required',
           'price' => 'required'
        ]);

        for ($i = 0; $i<count($request->price); $i++){
            $addProdServ = new prodserv([
                'libProdServ' => $request->designation[$i] ,
                'typeProdServ' => $request->type[$i] ,
                'prixProdServ' => $request->price[$i] ,
                'slugProdServ' => str::slug($request->designation[$i]),
                'imgProdServ' => request('img')[$i]->store('imgProd', 'public'),
                'entrepriseId' => $request->entreprise
            ]);

            $addProdServ->save();
        }

        $successMsg = "Bien joué ! Votre stock a été approvisionné !";
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
