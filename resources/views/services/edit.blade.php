@extends('adminlte::page')

@section('title', 'Modifier un service')
 
@section('content')<br>
    <form action="{{route('services.update', $service)}}" method="post">
        @method('PUT')
        @csrf
    <div class="container">
        <!-- <div class="col-12"> -->
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black"> <i class="fas fa-fw fa-briefcase"></i> Modifier un service</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Code du service</label>
                                <input type="text" class="form-control @error('codeserv') is-invalid @enderror" id="exampleInputName" placeholder="Code du service" name="codeserv"  id="codeserv"  value="{{$service->codeserv ?? old('codeserv')}}" >
                                @error('codeserv') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                        <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName"><i class="fas fa-fw fa-briefcase"></i> Libellé du service</label>
                        <input type="text" class="form-control @error('libelleservice') is-invalid @enderror" id="exampleInputName" placeholder="Libellé du service" name="libelleservice" value="{{$service->libelleservice ?? old('libelleservice')}}">
                        @error('libelleservice') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    </div>
                </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-user"> Modifier un service</i></button>
                    <a href="{{route('services.index')}}" class="btn btn-danger">
                        <i class="fa fa-user"> Annuler</i>
                    </a>
                </div>
            </div>
        <!-- </div> -->
    </div>
@stop