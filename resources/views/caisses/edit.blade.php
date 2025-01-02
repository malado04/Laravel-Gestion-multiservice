@extends('adminlte::page')

@section('title', 'Modifier un service')
 
@section('content')<br>
    <form action="{{route('caisses.update', $cai)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black"> <i class="fas fa-fw fa-plus"></i> Caisse</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Libellé caisse</label>
                                <input type="text" class="form-control @error('libelle') is-invalid @enderror" id="exampleInputName" placeholder="Libellé caisse" name="libelle"  id="libelle" value="{{$cai->libelle}}" required="" >
                                @error('libelle') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Point de vente</label>
                            <select id="fk_pdv_id" name="fk_pdv_id" required="" class="form-control @error('fk_pdv_id') is-invalid @enderror"> 
                                <optgroup  label="selectionner une zone">
                                    @foreach($pdvs as $key => $pdv)
                                  <option value="{{$pdv->id}}"> {{$pdv->nom_pdv}}</option>
                                @endforeach
                                @error('zone') <span class="text-danger">{{$message}}</span> @enderror
                                </optgroup>
                            </select>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">  <i class="fas fa-fw fa-edit"></i> Modifier </button>
                    <a href="{{route('caisses.index')}}" class="btn btn-danger">
                        Annuler
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop