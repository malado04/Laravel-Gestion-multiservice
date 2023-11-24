@extends('adminlte::page')

@section('title', 'Ajouter un PDV') 
@section('content')<br>
    <form action="{{route('pdvs.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black">Ajout d'un nouveau PDV
                    </h1>
                </div>
                <div class="card-body">
                <fieldset class="p-3 border border-info border-4">
                    <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i>Informations sur le PDV</i></h5></legend>
                    <div class="row">
                        <div class="col-md-6">
                     <div class="form-group">
                        <label for="exampleInputName">Nom point de vente</label>
                        <input type="text" class="form-control @error('nom_pdv') is-invalid @enderror" id="exampleInputName" placeholder="Nom point de vente" name="nom_pdv" value="{{old('nom_pdv')}}" required="">
                        @error('nom_pdv') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName">Zone</label>
                        <input type="text" class="form-control @error('fk_zone_id') is-invalid @enderror" id="exampleInputName" placeholder="Zone" name="fk_zone_id" value="{{old('fk_zone_id')}}" list="pdv_list" required="">
                            <datalist id="pdv_list" name="pdv_list" required="">
                                <optgroup  label="selectionner une zone">
                                    @foreach($zones as $key => $zone)
                                  <option value="{{$zone->id}} {{$zone->nom_zone}}"></option>
                                @endforeach
                                @error('zone') <span class="text-danger">{{$message}}</span> @enderror
                                </optgroup>
                            </datalist>
                        @error('zone') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                </div>
                </div>
                </fieldset>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Enregistrer</button>
                    <a href="{{route('pdvs.index')}}" class="btn btn-danger">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <i class="fas fa-sign-out"></i> Annuler
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop