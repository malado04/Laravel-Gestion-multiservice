@extends('adminlte::page')

@section('title', ' Ajouter un service')

@section('content')<br>
    <form action="{{route('services.store')}}" method="post" class="">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black"> <i class="fas fa-fw fa-plus"></i> Ajouter un service</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                     <!--    <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputName">Chapitre du service</label>
                                <input type="text" class="form-control @error('chapitre') is-invalid @enderror" id="exampleInputName" placeholder="Chapitre du service" name="chapitre"  id="chapitre" >
                                @error('chapitre') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputName">Catégorie du service</label>
                                <input type="text" class="form-control @error('categorie') is-invalid @enderror" id="exampleInputName" placeholder="Chapitre du service" name="categorie"  id="categorie" >
                                @error('categorie') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div> --> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Libellé du service</label>
                                <input type="text" class="form-control @error('libelle') is-invalid @enderror" id="exampleInputName" placeholder="Libellé du service" name="libelle"  id="libelle" >
                                @error('libelle') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{route('services.index')}}" class="btn btn-danger">
                        Annuler
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop