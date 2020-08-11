<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Directory HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{asset('assets/img/logo/loder.jpg')}}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->

<!-- header here -->

@include('layouts.appLayouts.header')

<!-- main here -->
@yield('main')

<!-- Footer Start-->
<footer>
    <div class="footer-area">
        <div class="container">
            <div class="footer-top footer-padding">
                <div class="row justify-content-between">
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Quick Link</h4>
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Listing</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Categories</h4>
                                <ul>
                                    <li><a href="#">Reasonable Hotel</a></li>
                                    <li><a href="#">Popular Restaurant</a></li>
                                    <li><a href="#">Easy Shopping</a></li>
                                    <li><a href="#">Night Life</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Download App</h4>
                                <ul>
                                    <li class="app-log"><a href="#"><img src="{{asset('assets/img/gallery/app-logo.png')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('assets/img/gallery/app-logo2.png')}}" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="footer-copy-right">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<?=date('Y')?> All rights reserved | Made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="">Un Pas Pour Une Course</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <!-- Footer Social -->
                        <div class="footer-social f-right">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>

<!-- Modal pour le formulaire de connexion -->
<div class="modal fade" id="loginForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alors, vous allez vous connecter ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{__('/trtlogin')}}">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="validationDefaultUsername">Pseudo ou telephone</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend1"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="number" name="tel" class="form-control" id="validationDefaultUsername" placeholder="+22501020304" aria-describedby="inputGroupPrepend1" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationDefaultMdp">Mot de passe</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend2"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" id="validationDefaultMdp" aria-describedby="inputGroupPrepend2" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10 offset-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Se souvenir de moi') }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @if (Route::has('password.request'))
                        <p><a href="{{ route('password.request') }}" style="color: black; text-decoration: underline">{{ __('recuperez mon mot de passe') }}</a></p>
                    @endif
                    <button type="submit" class="genric-btn primary">{{ __('Connexion') }} <i class="fa fa-lock-open"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- footer link here -->
@include('layouts.appLayouts.footerlink')
