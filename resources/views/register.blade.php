@extends('layouts.appLayouts.app')

@section ('main')

    <main>

        <!-- Hero Area Start-->
        <div class="slider-area hero-overly" style="background-image: url('{{asset('assets/img/hero/h1_hero.jpg')}}')">
            <div class="single-slider hero-overly  slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-9">
                            <!-- Hero Caption -->
                            <div class="hero__caption">
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                            <div class="card" style="background-color: rgba(248,247,255,0.8)">
                                <div class="card-header">
                                    <h3 class="card-title text-center">Rejoignez-nous et debutez une nouvelle
                                        aventure</h3>
                                </div>
                                <div class="card-body">

                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                        @elseif(session()->has('error'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('error') }}
                                            </div>
                                    @endif

                                    <form action="/createUser" method="post">
                                        @csrf
                                        <div class="alert alert-info">
                                            Veuillez remplir entierement le formulaire pour valider l'inscription.
                                            <strong>Les champs comportant le signe <sup>*</sup> sont des champs
                                                obligatoires !</strong>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="validationDefaultUsername">Vous vous inscrivez en tant que...</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend1">
                                                                <i class="fa fa-address-card"></i><sup
                                                                    style="font-size: 18px;">*</sup></span>
                                                        </div>
                                                        <select name="typeUser" id=""
                                                                class="form-control @error('typeUser') is-invalid @enderror">
                                                            <option value="">Faites un choix d'utilisateur</option>
                                                            <option value="Client"{{ (old("typeUser") == "Client" ? "selected":"") }}>Client</option>
                                                            <option value="Livreur" {{ (old("typeUser") == "Livreur" ? "selected":"") }}>Livreur</option>
                                                            <option value="Propriétaire" {{ (old("typeUser") == "Propriétaire" ? "selected":"") }}>Propriétaire d'établissement
                                                            </option>
                                                        </select>
                                                    </div>

                                                    @error('typeUser')
                                                    <p class="invalid-feedback" role="alert">
                                                        Tu es quel genre d'utilisateur ?
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="validationDefaultUsername">Nom & prénom(s)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend1"><i
                                                                    class="fa fa-user"></i><sup
                                                                    style="font-size: 18px;">*</sup></span>
                                                        </div>
                                                        <input type="text" name="nomPnom" value="{{ __(old("nomPnom")) }}"
                                                               class="form-control @error('nomPnom') is-invalid @enderror"
                                                               id="validationDefaultUsername"
                                                               placeholder="Nom et prenom(s)"
                                                               aria-describedby="inputGroupPrepend1">
                                                    </div>
                                                    @error('nomPnom')
                                                    <p class="invalid-feedback" role="alert">
                                                        tu t'appelles comment ? Faut mettre ton nom.
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="validationDefaultTel">Numéro de téléphone</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend2"><i
                                                                    class="fa fa-phone"></i><sup
                                                                    style="font-size: 18px;">*</sup></span>
                                                        </div>
                                                        <input type="number" name="tel" value="{{ __(old("tel")) }}"
                                                               class="form-control @error('tel') is-invalid @enderror"
                                                               id="validationDefaultTel" placeholder="Ex: +22501020304"
                                                               aria-describedby="inputGroupPrepend2">
                                                    </div>
                                                    @error('tel')
                                                    <p class="invalid-feedback">
                                                        Numéro de téléphone la est important hein !
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="validationDefaultEmail">E-mail</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend3"><i
                                                                    class="fa fa-envelope"></i></span>
                                                        </div>
                                                        <input type="email" placeholder="admin@uppuc.com" name="email" value="{{ __(old("email")) }}"
                                                               class="form-control @error('email') is-invalid @enderror"
                                                               id="validationDefaultEmail"
                                                               aria-describedby="inputGroupPrepend3">
                                                    </div>
                                                    @error('email')
                                                    <p class="invalid-feedback">
                                                        Renseignez votre E-mail svp !
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="validationDefaultDateNaiss">Date de naissance</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend-3"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input type="date" placeholder="07/04/2020" name="dateNais" value="{{ __(old("dateNais")) }}"
                                                               class="form-control @error('dateNais') is-invalid @enderror"
                                                               id="validationDefaultDateNaiss"
                                                               aria-describedby="inputGroupPrepend-3">
                                                    </div>
                                                    @error('dateNais')
                                                    <p class="invalid-feedback">
                                                        On peut savoir votre date de naissance ?
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <dinv class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="validationDefaultUsername">Vous habitez quelle commune
                                                        ?</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="">
                                                                <i class="fa fa-map-marker"></i>
                                                                <sup style="font-size: 18px;">*</sup>
                                                            </span>
                                                        </div>
                                                        <select name="commune" id=""
                                                                class="form-control @error('commune') is-invalid @enderror">
                                                            <option value="">Sélectionnez votre commune ?</option>
                                                            @foreach(App\commune::all() as $commune)
                                                                <option value="{{__($commune->comId)}}" {{ (old("commune") == $commune->comId ? "selected":"") }}>{{__($commune->libCom)}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    @error('commune')
                                                    <p class="invalid-feedback" role="alert">
                                                        On veut te rendre visite de temps en temps, stp dis nous ta
                                                        commune !
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="validationDefaultCheck">Vous êtes ?<sup style="font-size: 18px;">*</sup></label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input {{(old("genre") == "F") ? "checked":""}} value="F" name="genre" type="radio" id="btnRadio1">
                                                                <label class="form-check-label @error('genre')is-invalid @enderror" for="btnRadio1">
                                                                    Femme
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input {{(old("genre") == "M") ? "checked":""}} value="M" name="genre" type="radio" id="btnRadio2">
                                                                <label class="form-check-label @error('genre')is-invalid @enderror" for="btnRadio2">
                                                                    Homme
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('genre')
                                                    <p class="invalid-feedback" role="alert">
                                                        Tu es femme, garçon oubien c'est bizarre ?
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </dinv>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="validationDefaultMdp">Mot de passe</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend4"><i
                                                                    class="fa fa-lock"></i><sup
                                                                    style="font-size: 18px;">*</sup></span>
                                                        </div>
                                                        <input type="password" name="password"
                                                               class="form-control  @error('password') is-invalid @enderror"
                                                               id="validationDefaultMdp"
                                                               aria-describedby="inputGroupPrepend4">
                                                    </div>
                                                    @error('password')
                                                    <p class="invalid-feedback">
                                                        Si tu n'entres pas ton mot de passe tu veux te connecter comment
                                                        ?
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="validationDefaultCmdp">Confimer le mot de passe</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend4"><i
                                                                    class="fa fa-lock"></i><sup
                                                                    style="font-size: 18px;">*</sup></span>
                                                        </div>
                                                        <input type="password" name="cmdp"
                                                               class="form-control @error('cmdp') is-invalid @enderror"
                                                               id="validationDefaultCmdp"
                                                               aria-describedby="inputGroupPrepend4">
                                                    </div>
                                                    @error('cmdp')
                                                    <p class="invalid-feedback">
                                                        Fqut bien regarder tes mots de passe, ils ne sont pas pareils !
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="switch-wrap d-flex justify-content-between">
                                            <div class="primary-switch">
                                                <input type="checkbox" id="default-switch" required>
                                                <label for="default-switch"></label>
                                            </div>
                                            <p>J'ai lu et j'accepte <a href=""style="color: black; text-decoration: underline">
                                                    les conditions d'utilisation</a>
                                            </p>
                                        </div>

                                        <button style="float: right" type="submit" class="genric-btn primary">Valider <i class="fa fa-send"></i></button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
