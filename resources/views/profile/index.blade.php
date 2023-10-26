@extends('adminlte::page')

@section('icon_page', 'user') 

@section('title', 'User Profile') 

@section('content') 

	<div class="container mt-10" style="margin-top: 10%;">
	<div class="col-md-9">
		<div class="nav-tabs-custom">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h3 class="m-0 text-black"> 
	                    <ul class="nav nav-tabs">
							<li class="active"><a href="#profile" data-toggle="tab" class=" text-white"><i class="fa fa-fw fa-user p-2 text-white"></i> Profile</a></li>
							<li><a href="#settings" data-toggle="tab" class=" text-white"><i class="fa fa-fw fa-key p-2 text-white"></i> Password</a></li>
							<li><a href="#avatar" data-toggle="tab" class=" text-white"><i class="fa fa-fw fa-image p-2 text-white"></i> Avatar</a></li>
						</ul>
					</h3>
                </div>
					
			<div class="tab-content container">
				<div class="active tab-pane" id="profile">
					<form action="{#{ route('profile.update.profile',$user->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="nome">Name</label>
                            <input type="text" name="name" class="form-control" maxlength="30" minlength="4" placeholder="Name" required="" value="{{$user->name}}">
                            @if($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
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
                        <div class="form-group text-right">
                           <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Save Profile</button>
                        </div>
					</form>						
				</div>
				<div class="tab-pane" id="settings"> 
					settings
				</div>
				<div class="tab-pane" id="avatar"> 
					<div class="row">
						<div class="col-md-3">
							<div class="box box-primary">
								<div class="box-body box-profile">
									@if(file_exists(Auth::user()->avatar))
						              <img src="{{ asset(Auth::user()->avatar) }}" class="profile-user-img img-responsive img-circle">
						            @else
						              <img src="{{ asset('images/IPMIEZ.png') }}" class="profile-user-img img-responsive img-circle">
						            @endif							
									<h3 class="profile-username text-center">
										@if(Auth::user('name'))
							              {{ Auth::user()->name }}
							            @endif
									</h3>	
								</div>
							</div>		
						</div>
					</div>
				</div>
				
			</div>
		</div>
		</div>
	</div>
</div>

@endsection