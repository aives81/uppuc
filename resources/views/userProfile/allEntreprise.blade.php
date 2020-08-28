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
                        <div>Toutes vos entreprises se retrouvent ici !!
                            <div class="page-title-subheading">
                                Ici, vous pourrez:
                                <ul>
                                    <li>Les voir plus en détails</li>
                                    <li>Leur apporter des modifications</li>
                                    <li>Ou peut être les supprimer</li>
                                </ul>
                                FAITES COMME CHEZ VOUS !!
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--B O D Y OFF THIS PAGE-->
            <div class="row">
                <div class="col-md-12">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr style="font-size: 15px">
                            <th style="width: 20%">Intitulé</th>
                            <th>Commande en attente</th>
                            <th>Commande validée</th>
                            <th>Commande annulée</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php($entreprises = DB::table('entreprises')->where('id', Auth::user()->id)->get())
                            @foreach($entreprises as $entreprise)
                                <tr>
                                    <td>{{__($entreprise->entrepriseTitle)}}</td>
                                    <td>{{__(rand(1, 100))}}</td>
                                    <td>{{__(rand(1, 100))}}</td>
                                    <td>{{__(rand(1, 100))}}</td>
                                    <td>
                                        <a href="{{__($entreprise->entrepriseId)}}" class="btn btn-primary" style="font-size: 10px"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" style="font-size: 10px"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
