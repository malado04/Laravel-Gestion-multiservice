
@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif

        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

        <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <link rel="stylesheet" href="{{ mix(config('adminlte.laravel_mix_css_path', 'css/app.css')) }}">

        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />

        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicons/android-icon-192x192.png') }}">
        <link rel="manifest" href="{{ asset('favicons/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">

        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

        <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

        <script src="{{ mix(config('adminlte.laravel_mix_js_path', 'js/app.js')) }}"></script>
<style type="text/css">
    body{
        font-family: "Times New Roman";
    }

    video{
        margin-top: 25%;
        border-left: 4px solid #E91E63;
        border-radius: 15px;
        z-index: +1000;
    }

    fieldset{
        margin-top: 15%;
        background-color: rgba(0,0,0,0.2); 
        border-left: 4px solid #E91E63;
        border-radius: 15px;
        z-index: +1000;
    }
    legend{
        /*border: 1px solid #FFFF;*/
        width: 35%;
        height: 155px;
    }

    .darkred{
        background-color: darkred; 
        color: white;
    }
    
    .img1{
        position: absolute;
        z-index:10%;
        width: 40%; 
        margin-top: 5%;
    }
    
    .img2{
        position: absolute;
        float: left;
        z-index:-100%;
        width: 100%;
        /*height: 100%;*/
    }
    .rose{
        background-color: #E91E63;
        color: white;
    }
    input{
        color: black;
    }
body{
    width: 100%;
    background-image: url("images/roles-graphic.png");
    background-repeat: no-repeat;
}
</style>
<!-- <img class="img1" src="images/next-blue.png" style="">                         -->

<div class="container-fluid">
                    <div class="row">
                    <div class="col-md-1 col-sm-1 col-xsm-1 col-lg-1 col-xlg-1">
<!-- <img class="img1 img-circle border-8 border-darkred" src="images/roles-graphic.png" style="width: 100%;"> -->
</div>
                    <div class=" col-md-5 col-sm-5 col-xsm-5 col-lg-5 col-xlg-5">
                        <fieldset class="p-3 border border-darkred border-8">
                            <legend class="text-center">
                                    <a href="https://espace-services.com"><img class="" src="images/Inscription.png" style="width: 100%;"></a>
                            </legend> 
                    <form action="{{ $register_url }}" method="post">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <input type="text" name="prenom" class="form-control {{ $errors->has('prenom') ? 'is-invalid' : '' }}"
                                   value="{{ old('prenom') }}" placeholder="Votre prénom " autofocus required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('prenom'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('prenom') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                   value="{{ old('name') }}" placeholder="Votre nom de famille" autofocus required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                        </div>

                      <!--   <div class="input-group mb-3">
                            <input type="text" value="{{ old('email') }}"  name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Votre email" aria-label="Votre email">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control text-white" placeholder="espace-services.com" readonly="" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                            @endif
                        </div> -->

                        {{-- Email field --}}
                        <div class="input-group mb-3">
                            <input type="tel" name="tel" class="form-control {{ $errors->has('tel') ? 'is-invalid' : '' }}"
                                   value="{{ old('tel') }}" placeholder="Votre numéro nde téléphone" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('tel'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('tel') }}</strong>
                                </div>
                            @endif
                        </div>
                   
                        <input type="checkbox" name="" checked="" required> <a href="{{ $login_url }}">Lire et accpepter la politique de confidentialité de Multiservices </a>
<br><br>
                        {{-- Register button --}}
                        <button type="submit" class=" form-control {{ config('adminlte.classes_auth_btn', 'btn-flat btn-flat btn-primary') }}"style="background-color: #004D40; border: 2px solid #004D40; border-radius: 5px;">
                            <span class="fas fa-user-plus"></span>
                            Me créer un compte
                        </button>
                    </form> 
                                 <p class="my-0">
                                    <a href="{{ $login_url }}" class="form-control text-center" style="background-color: #E91E63; border: 2px solid #E91E63; border-radius: 5px; color: white;">
                                        <span class="fas fa-sign-in-alt"></span> J'ai déja un compte !
                                        <!-- {#{ __('adminlte::adminlte.i_already_have_a_membership') }} -->
                                    </a>
                                </p>
                    </fieldset>
                    </div>
              
                    <div class="col-md-6 col-sm-6 col-xsm-6 col-lg-6 col-xlg-6">
                        <center>
                            <video src="videos/202404011542.mp4" controls="" autoplay="" style="width: 100%;">
                            </video>
                        </center>
<!-- <img class="img1 img-circle border-8 border-darkred" src="images/roles-graphic.png" style="width: 99%; position: absolute; z-index: -100%;"> -->
                        <!-- <img class="img1" src="images/next-red.png" style="width: 100%;"> -->
                    </div>
                </div>
</div>
