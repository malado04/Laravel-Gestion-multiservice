@extends('adminlte::page')

@section('icon_page', 'user') 

@section('title', 'User Profile') 

@section('content') 

	<div class="container mt-10" style="margin-top: 10%;">
	<div class="col-md-9">
		<div class="nav-tabs-custom">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h3 class="m-0 text-black"> 
	                    <ul class="nav nav-tabs">
							<li class="active p-3"><a href="#profile" data-toggle="tab" class="text-white"><i class="fa fa-fw fa-user text-white"></i> Profil</a></li>
							<li class=" p-3"> <b> | </b><a href="#settings" data-toggle="tab" class="text-white"><i class="fa fa-fw fa-key text-white"></i>  Mot de passe</a></li>
							<li class=" p-3"> <b> | </b><a href="#avatar" data-toggle="tab" class="text-white"><i class="fa fa-fw fa-image  text-white"></i>  Photo de profil</a></li>
						</ul>
					</h3>
                </div>
					
			<div class="tab-content container">
				<div class="active tab-pane" id="profile">
					<form action="{#{ route('profile.update.profile',$user->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="nome">Nom</label>
                            <input type="text" name="name" class="form-control" maxlength="30" minlength="4" placeholder="Nom" required="" value="{{$user->name}}">
                            @if($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
						<div class="form-group {{ $errors->has('prenom') ? 'has-error' : '' }}">
                            <label for="nome">Prénom</label>
                            <input type="text" name="prenom" class="form-control" maxlength="30" minlength="4" placeholder="Prénom" required="" value="{{$user->prenom}}">
                            @if($errors->has('prenom'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('prenom') }}</strong>
                                </span>
                            @endif
                        </div>
						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="nome">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail" required="" value="{{$user->email}}">
                            @if($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>	
					</form>						
				</div>
				<div class="tab-pane" id="settings"> 
						<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="nome">Mot de passe</label>
                            <input type="email" name="password" class="form-control" placeholder="Mot de passe" required="" value="{{$user->password}}">
                            @if($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>	
				</div>
				<div class="tab-pane" id="avatar"> 
					<div class="row">
						<div class="col-md-3">
							<div class="box box-primary">
								<div class="box-body box-profile">
									@if(file_exists(Auth::user()->avatar))
						              <img src="images/{{ asset(Auth::user()->avatar) }}" class="profile-user-img img-responsive">
						            @else
						              <img src="{{ asset('images/Image2.png') }}" class="w-100">
						            @endif							
								</div>
							</div>		
						</div>
					</div>
				</div>
				
			</div>
			<div class="footer bg-dark p-4">
                        <div class="form-group text-right">
                           <button type="submit" class="btn form-control btn-info"><i class="fa fa-fw fa-save"></i> Enregistrer le profil</button>
                        </div>
			</div>
		</div>
		</div>
	</div>
</div>

@endsection