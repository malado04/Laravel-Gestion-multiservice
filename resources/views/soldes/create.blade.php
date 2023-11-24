@extends('adminlte::page')

@section('title', ' Ajouter un caisse')

@section('content')<br>
    <form action="{{route('soldes.store')}}" method="post" class="">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black"> <i class="fas fa-fw fa-plus"></i> Solde caisse</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Montant solde</label>
                                <input type="number" min="0" class="form-control @error('montant') is-invalid @enderror" id="exampleInputName" placeholder="Montant solde" name="montant"  id="montant" >
                                @error('montant') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Point de vente</label>
                            <select id="fk_caisse_id" name="fk_caisse_id" required="" class="form-control @error('fk_caisse_id') is-invalid @enderror"> 
                                    @foreach($caisses as $key => $caisse)
                                    <optgroup  label="Point de vente : {{optional($caisse->pdv)->nom_pdv}}">
                                      <option value="{{$caisse->id}}"> {{$caisse->libelle}}</option>
                                    </optgroup>
                                @endforeach
                                @error('zone') <span class="text-danger">{{$message}}</span> @enderror
                            </select>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{route('soldes.index')}}" class="btn btn-danger">
                        Annuler
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop