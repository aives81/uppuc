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
                        <div>Enregistrment d'entreprise et bien plus encore...
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
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-cog fa-w-20"></i>
                                    </span>
                                Actions
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true"
                                 class="dropdown-menu dropdown-menu-right">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a  role="tab" class="nav-link active" data-toggle="tab" href="#tab-content-0">
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

            <!--B O D Y OFF THIS PAGE-->

        </div>
    </div>

@endsection
