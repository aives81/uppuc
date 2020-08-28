@extends('userProfile.adminLayout.app')
@section('content')

    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="fa fa-home icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div>Enregistrement d'entreprise et bien plus encore...
                            <div class="page-title-subheading">
                                Ici, vous pourrez:
                                <ul>
                                    <li>Ajouter toutes vos entreprises</li>
                                    <li>Ajouter des produits pour vos entreprises existantes</li>
                                    <li>Ajouter des images pour vos entreprises existantes</li>
                                </ul>
                                G E N I A L NOOONN !!
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <div class="d-inline-block dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    class="btn-shadow dropdown-toggle btn btn-info">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-cog fa-w-20"></i>
                                    </span>
                                Actions
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true"
                                 class="dropdown-menu dropdown-menu-right">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link active" data-toggle="tab" href="#tab-content-0">
                                            <i class="nav-link-icon lnr-book"></i>
                                            <span>
                                                Book
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" data-toggle="tab" href="#tab-content-1">
                                            <i class="nav-link-icon lnr-picture"></i>
                                            <span>
                                                Ajout de produits
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" data-toggle="tab" href="#tab-content-2">
                                            <i class="nav-link-icon lnr-file-empty"></i>
                                            <span>
                                                Ajout d'une entreprise
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                        <li class="nav-item">
                            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                <span>une entreprise de plus !!</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                                <span>Encore plus de produits</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-2">
                                <span>Illustrez mieux vaux entreprises</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <span class="alert alert-info">
                        Remarque: Tous les champs ou sections avec la marque <sup style="font-weight: bold">*</sup> sont obligatoires ! Ne les laissez pas vide SVP !!
                    </span>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="/addEntreprise" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">Information sur l'entreprise*</h5>
                                                <div>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">Nom de l'entreprise</span>
                                                        </div>
                                                        <input placeholder="Ex: Un Pas Pour Une Course" type="text"
                                                               name="title" class="form-control">
                                                    </div>
                                                    <br>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">Décrivez l'entreprise ici</span>
                                                        </div>
                                                        <textarea class="form-control" placeholder="Bla bla bla bla bla"
                                                                  name="description" id="" cols="92"
                                                                  rows="5"></textarea>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text">Indiquez la catégorie de l'entreprise</span>
                                                                </div>
                                                                <select name="categorie" class="form-control" id="">
                                                                    <option value="">Choisissez la catégorie</option>
                                                                    @foreach(App\categorie::all() as $categorie)
                                                                        <option value="{{$categorie->catId}}">{{$categorie->libCat}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <div class="input-group-append"><span class="input-group-text">Choisissez la photo de couverture</span>
                                                                </div>
                                                                <input name="img" type="file" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">Information sur les jours de disponibilité*</h5>
                                                <div>

                                                    <?php

                                                        $tabJour = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
                                                        for ($i = 0; $i < count($tabJour) ; $i++) {
                                                    ?>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <div>
                                                                        <div class="custom-checkbox custom-control">
                                                                            <div class="position-relative form-check">
                                                                                <label class="form-check-label">
                                                                                    <input type="checkbox"
                                                                                           id="j<?= $i + 1; ?>"
                                                                                           value="<?= $tabJour[$i]; ?>"
                                                                                           name="j[]"
                                                                                           onchange="voir(<?= $i + 1; ?>);"
                                                                                           class="form-check-input">
                                                                                    <?= $tabJour[$i]; ?>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-8">
                                                                <div style="display: none;" id="div<?= $i + 1; ?>">

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="input-group">
                                                                                <div class="input-group-append"><span class="input-group-text">De</span></div>
                                                                                <select class="form-control" onchange="checkVal(<?= $tabJour[$i]; ?>);"
                                                                                        name="heureOuv<?= $tabJour[$i]; ?>"
                                                                                        id="heureOuv<?= $tabJour[$i]; ?>">

                                                                                    <option value="">Heure d'ouverture</option>

                                                                                    <?php for ($j = 1; $j <= 24 ; $j++) { ?>

                                                                                    <option
                                                                                        value="<?= $j; ?>"><?= $j . "H"; ?></option>

                                                                                    <?php } ?>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input-group">
                                                                                <div class="input-group-append"><span class="input-group-text">à</span></div>
                                                                                <select class="form-control" onchange="checkVal(<?= $tabJour[$i]; ?>);"
                                                                                        name="heureFerm<?= $tabJour[$i]; ?>"
                                                                                        id="heureFerm<?= $tabJour[$i]; ?>">

                                                                                    <option value="">Heure de ferméture</option>

                                                                                    <?php for ($j = 1; $j <= 24 ; $j++) { ?>

                                                                                    <option
                                                                                        value="<?= $j; ?>"><?= $j . "H"; ?></option>

                                                                                    <?php } ?>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">La situation géographique*</h5>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text">Indiquez la commune</span>
                                                                </div>
                                                                <select name="commune" class="form-control" id="">
                                                                    <option value="">Choisissez la commune</option>
                                                                    @foreach(App\commune::all() as $commune)
                                                                        <option value="{{$commune->comId}}">{{$commune->libCom}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Plus de details</span>
                                                                </div>
                                                                <input placeholder="Ex: Adjamé derriere la grande mosquée" type="text" name="descriptionEmplacement" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="hidden" id="lat" name="lat" required>
                                                            <input type="hidden" id="lng" name="lng" required>

                                                            <div class="geocoder">
                                                                <div id="geocoder"></div>
                                                            </div>
                                                            <div id="map"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <input type="hidden" name="user" value="{{Auth::user()->id}}">
                                                <button class="btn btn-success" type="submit" style="float: left; width: 100%">Et Hop ! On enregistre <i class="fa fa-send"></i></button>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Input Groups</h5>
                                            <div>
                                                <form action="" enctype="multipart/form-data" method="post">
                                                    @csrf
                                                    <table id="item_table" class="table table-striped table-bordered">
                                                        <tr>
                                                            <th>Quelle est sa désignation</th>
                                                            <th>Est ce un produit ou un service ?</th>
                                                            <th>Quel est son prix ?</th>
                                                            <th>Une image descriptive</th>
                                                            <th>
                                                                <button style="background: #28a745" type="button"
                                                                        class="btn btn-success btn-sm add" id="addProd"><i
                                                                        class="fa fa-plus"></i>
                                                                </button>
                                                            </th>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane tabs-animation fade" id="tab-content-2" role="tabpanel">
                            <form class="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Checkboxes</h5>
                                                <div class="position-relative form-group">
                                                    <div>
                                                        <form action="" enctype="multipart/form-data" method="post">
                                                            @csrf
                                                            <table id="item_table1" class="table table-striped table-bordered">
                                                                <tr>
                                                                    <th>choisissez l'entreprise</th>
                                                                    <th>Selectionnez autant d'image possible</th>
                                                                    <th>
                                                                        <button style="background: #28a745" type="button"
                                                                                class="btn btn-success btn-sm add" id="addPicture"><i
                                                                                class="fa fa-plus"></i>
                                                                        </button>
                                                                    </th>
                                                                </tr>
                                                            </table>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />

    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />

    <!--Code pour la carte-->
    <script type="text/javascript">

        var saved_markers = [-3.967696,5.356331];
        var user_location = [-4.033333,5.316667];
        mapboxgl.accessToken = 'pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v9',
            center: user_location,
            zoom: 10
        });
        //  geocoder here
        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            // limit results to Australia
            //country: 'IN',
        });

        var marker ;

        // After the map style has loaded on the page, add a source layer and default
        // styling for a single point.
        map.on('load', function() {
            addMarker(user_location,'load');
            add_markers(saved_markers);

            // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
            // makes a selection and add a symbol that matches the result.
            geocoder.on('result', function(ev) {
                //alert("aaaaa");
                console.log(ev.result.center);

            });
        });

        map.on('click', function (e) {
            marker.remove();
            addMarker(e.lngLat,'click');
            //console.log(e.lngLat.lat);
            document.getElementById("lat").value = e.lngLat.lat;
            document.getElementById("lng").value = e.lngLat.lng;

        });

        function addMarker(ltlng,event) {

            if(event === 'click'){
                user_location = ltlng;
            }
            marker = new mapboxgl.Marker({draggable: true,color:"#d02922"})
                .setLngLat(user_location)
                .addTo(map)
                .on('dragend', onDragEnd);
        }
        // function add_markers(coordinates) {
        //
        //     var geojson = (saved_markers == coordinates ? saved_markers : '');
        //
        //     console.log(geojson);
        //     // add markers to map
        //     geojson.forEach(function (marker) {
        //         console.log(marker);
        //         // make a marker for each feature and add to the map
        //         new mapboxgl.Marker()
        //             .setLngLat(marker)
        //             .addTo(map);
        //     });
        //
        // }

        function onDragEnd() {
            var lngLat = marker.getLngLat();
            document.getElementById("lat").value = lngLat.lat;
            document.getElementById("lng").value = lngLat.lng;
            //console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
        }

        /*$('#signupForm').submit(function(event){
            event.preventDefault();
            var lat = $('#lat').val();
            var lng = $('#lng').val();
            var url = 'locations_model.php?add_location&lat=' + lat + '&lng=' + lng;
            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                success: function(data){
                    alert(data);
                    location.reload();
                }
            });
        });*/

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

    </script>

    <!--Code pour les jour de disponiblité-->
    <script type="text/javascript">

        function voir(e) {

            if(document.getElementById('j'+e).checked){

                document.getElementById('div'+e).style.display = "inline-block";

            }else{
                document.getElementById('div'+e).style.display = "none";
            }

        }

        function checkVal(jour) {

            if (parseInt(document.getElementById('heureOuv' + jour).value) > parseInt(document.getElementById('heureFerm' + jour).value)) {

                alert("L'heure d'ouverture doit être inférieure à celle de ferméture ! Veuillez modifier.");

            }

        }

        document.getElementById('btnVal').addEventListener('click', function (e) {

            var elementCheck = document.querySelectorAll('input[type=checkbox]');
            var cptCheck = 0;

            for (var i = 0; i < elementCheck.length; i++) {

                if (elementCheck[i].checked == true) {
                    cptCheck++;
                }

            }

            if (cptCheck == 0) {

                e.preventDefault();
                alert("Choisissez au moins une date à laquelle vous êtes ouverte !");

            }

        });
    </script>
@endsection
