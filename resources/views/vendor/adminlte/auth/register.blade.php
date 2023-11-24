@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
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
  <!--   <div class="col-md-1">
         <img src="images/sen.png" style="width:100%; height:100%"> -
    </div> -->
    <div class="col-md-9">
 <i style=""><h1 style="font-size :55px; font-family: Times New Roman; color: blue"><b><span style="color: darkblue;"> <i>Sen-Multi-Services</i></b></h1></i>

</div>
<div class="col-md-3">
    
                    <p class="my-0">
                        <a href="{{ $login_url }}" class="darkred form-control text-center">
                           
                            <span class="fas fa-sign-in-alt"></span> Me connecter !
                            <!-- {#{ __('adminlte::adminlte.i_already_have_a_membership') }} -->
                        </a>
                    </p>
</div>
</div>
</div>
<!-- <img src="images/5.svg" style="position: absolute; z-index:-100%;height:100%; width: 100%;"> -->

<div class="container-fluid">
                    <div class="row">
                    <div class="col-md-2"></div>
                    <div class=" col-xsm-4 col-md-4 col-sm-6 col-lg-4 col-xlg-4">
                        <fieldset class="bg-white p-3 border border-darkred border-8 ">
                            <legend style="text-align: center; width:100%" class="{{ config('adminlte.classes_auth_btn', 'btn-flat btn-flat btn-primary') }}">
                                 <i style=""><h1 style="font-size :45px; font-family: Times New Roman; color: white"><b><span style="color: white;"> <i> Inscription</i></b></h1></i>
                            </legend> 
                         <form action="{{ $register_url }}" method="post">
                        {{ csrf_field() }}

                 {{-- Name field --}}
                        <div class="input-group mb-3">
                            <input type="text" name="cni" class="form-control {{ $errors->has('cni') ? 'is-invalid' : '' }}"
                                   value="{{ old('cni') }}" placeholder="Numéro CNI" autofocus required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-card-plus {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('cni'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('cni') }}</strong>
                                </div>
                            @endif
                        </div>
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
                        {{-- Email field --}}
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" required>
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
                            <input type="password" name="password"
                                   class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" required
                                   placeholder="Votre mo de passe">
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

                        {{-- Confirm password field --}}
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation"
                                   class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                   placeholder="Confirmer votre mo de passe" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                </div>
                            </div>
                            @if($errors->has('password_confirmation'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </div>
                            @endif
                        </div>
                    <input type="checkbox" name="" checked="" required> <a href="{{ $login_url }}">Lire et accpepter la confidentialité </a>
<br><br>
                        {{-- Register button --}}
                        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-flat btn-primary') }}">
                            <span class="fas fa-user-plus"></span>
                            Me créer un compte
                        </button>

                    </form>
                    </fieldset>
                    </div>
              
                    <div class=" col-xs-4 col-md-4 col-sm-4 col-lg-4 col-xlg-4">
<!--                             <img src="images/2.svg" style="position: absolute; z-index:-100%; margin-top: 10%;height:100%; width: 100%;">
 -->                            
                        </div>
                </div>
</div>
