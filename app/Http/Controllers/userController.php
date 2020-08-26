<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Auth\LoginController as loginController;

class userController extends loginController
{
    use AuthenticatesUsers;

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

    public function authenticate(Request $request)
    {
        $isGoodCredential = false;
        $credentials = ['tel' => $request->tel, 'password' => $request->password, 'numActiv' => 1];
        if (Auth::attempt($credentials)) {
            $isGoodCredential = true;
            $msg = "Heureux de vous revoir ";
            $msg .= (Auth::user()->genreUser == "M") ? "M. ": 'Mme. ';
            $msg .= Auth::user()->nomPrenom;
            Flashy::message($msg);
        }else{
            $msg = "Une erreur s'est produite ! Vérifiez votre numéro de téléphone ou votre mot de passe";
            Flashy::error($msg);
            $isGoodCredential = false;
        }
        return ($isGoodCredential) ? redirect('/Utilisateur/Profil') : back();
    }

    public function logout(Request $request)
    {
        Flashy::message("A tres bientot !!");
        Auth::logout();
        return redirect('/');
    }

    /**
     * Methode pour retourner le formulaire d'enregistrement
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function create(){
        return view('register');
    }

    /**
     * Methode pour l'inscription d'un utilisateur
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function store(Request $request){

        //
        $request->validate([
            'nomPnom' => 'required',
            'tel' => 'required|unique:users',
            'password' => 'required',
            'cmdp' => 'required',
            'typeUser' => 'required',
            'commune' => 'required',
            'dateNais' => 'required',
            'genre' => 'required'
        ]);

        if ($request->password != $request->cmdp)
        {
            $msg = "Regardes bien tes mots de passe; Il ne sont pas identiques !";
            Flashy::error($msg);
            return back();
        }

        $user = new User([
            'nomPrenom' => $request->nomPnom,
            'email' => $request->email,
            'tel' => $request->tel,
            'password' => Hash::make($request->password),
            'typeUser' => $request->typeUser,
            'comId' => $request->commune,
            'dateNaiss' => $request->dateNais,
            'codeActivNum' => $this->generateSmsCode(),
            'genreUser' => $request->genre
        ]);
        $user->save();

        $msg = "Félicitation $request->nomPnom ! Il vous reste une étape, celle de vérifier votre numéro de téléphone avec le code que nous venons de vous envoyer pas sms";
        Flashy::message($msg);
        return back();
    }

    /**
     * Methode pour la generation d'un code a envoyer par sms au nuemro de l'user
     * Apres le parametrage de l'api d'orange, rajouter le numéro de l'user comme parametre
     */
    public function generateSmsCode():int
    {
        $smsCode ='';
        for ($i=0; $i<=4; $i++){
            $smsCode .= rand(0, 9);
        }
        return (int)$smsCode;
    }
}
