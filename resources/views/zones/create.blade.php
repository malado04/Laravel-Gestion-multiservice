@extends('adminlte::page')

@section('title', 'Ajouter un citoyen') 
@section('content')<br>
    <form action="{{route('zones.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black">Ajout d'une zone
                    </h1>
                </div>
                <div class="card-body">
                <fieldset class="p-3 border border-info border-4">
                    <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Informations sur la zone</i></h5></legend>
                     <div class="form-group">
                        <label for="exampleInputName">Nom de la zone</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="exampleInputName" placeholder="Nom de la zone" name="nom_zone" value="{{old('nom_zone')}}" required="">
                        @error('nom_zone') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </fieldset>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Enregistrer</button>
                    <a href="{{route('zones.index')}}" class="btn btn-danger">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <i class="fas fa-sign-out"></i> Annuler
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop