
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
    fieldset{
        margin-top: 10%;
        border: 4px solid gray;
        border-radius: 10px;
    }

    .darkred{
        background-color: darkred; 
        color: white;
    }
</style>
<img src="images/2.png" style="position: absolute; z-index:-100%;height:100%; width: 100%;">

<div class="container-fluid">
<div class="row p-2">
    <div class="col-md-7 col-sm-6">
 <i style=""><h1 style="font-size :55px; font-family: Times New Roman; color: blue"><b><span style="color: darkblue;"> <i>Sen-Multi-Services</i></b></h1></i>

</div>
<div class="col-md-3 col-sm-3 col-xsm-2">
    
                    <p class="my-0">
                        <a href="{{ $password_reset_url }}" class="darkred form-control text-center">
                           
                            <span class="fas fa-sign-out-alt"></span> Mot de passe oublié!
                            <!-- {#{ __('adminlte::adminlte.i_already_have_a_membership') }} -->
                        </a>
                    </p>

</div>
<div class="col-md-2 col-msm-3 col-xsm-2">
                    <p class="my-0">
                        <a href="{{ $register_url }}" class="darkred form-control text-center">
                            <span class="fas fa-sign-in-alt"></span> S'inscrire !
                            <!-- {#{ __('adminlte::adminlte.i_already_have_a_membership') }} -->
                        </a>
                    </p>
</div>
</div>
</div>

<div class="container-fluid">
                    <div class="row">
                    <div class="col-1 col-sm-1 col-md-2"></div>
                    <div class=" col-5 col-md-4 col-sm-5 col-lg-4 col-xlg-4">
                        <fieldset class="bg-white p-3 border border-darkred border-8">
                            <legend style="text-align: center; width:75%" class="{{ config('adminlte.classes_auth_btn', 'btn-flat btn-flat btn-primary') }}">
                                 <i style=""><h1 style="font-size :55px; font-family: Times New Roman; color: blue"><b><span style="color: darkblue;"> <i>Me connecter</i></b></h1></i>
                            </legend>
                            <!-- <h2 class="text-center">Me connecter</h2> -->
                    <form action="{{ $login_url }}" method="post" style="height: 250px; min-width:100%;" class="form-control">
                                        {{ csrf_field() }}<br>
                                <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                   value="{{ old('email') }}" placeholder="Adresse email" autofocus  class="form-control">
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
                        </div>

                        {{-- Password field --}}
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                   placeholder="Votre mo de passe"  class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </div>
                            @endif
                        </div>

                        {{-- Login field --}}
                        <div class="row">
                            <div class="col-12">
                                <div class="icheck-primary">
                                    <input type="checkbox" checked name="" required> <a href="{{ $login_url }}">Se souvenir de moi</a>
                                </div>
                            </div>
                            <div class="col-12"><br>
                                <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}"  class="form-control">
                                    <span class="fas fa-sign-in-alt"></span>
                                    Me connecter !
                                </button>
                            </div>
                        </div>

                    </form>
                    </fieldset>
                    </div>
              
                    <div class=" col-xs-4 col-md-4 col-sm-4 col-lg-4 col-xlg-4">
                            <!-- <img src="images/Vector08.png" style="position: absolute; z-index:-100%; margin-top: 10%;height:100%; width: 100%;"> -->
                            
                        </div>
                </div>
</div>
