@extends('adminlte::page')

@section('title', ' Ajouter un service')

@section('content')<br>

<style>
    .fileUpload {
    cursor: pointer; /* "hand" cursor */
}
.input_container {
  background-color:#5bc0de;
  border: 2px solid #5bc0de;
}

input[type=file]::file-selector-button {
  background-color:#e5e5e5;
  color: #000;
  border: 0px;
  border: 2px solid #5bc0de;
  transition: .5s;
}

input[type=file]{
  background-color:#5bc0de;
  color: #000;
  border: 0px;
  border: 2px solid #;
  transition: .5s;
}

input[type=file]::file-selector-button:hover {
  background-color: #5bc0de;
  border: 0px;
  background-color:#e5e5e5;
  border-right: 2px solid #5bc0de;
}
</style>
    <form action="{{route('services.store')}}" method="post" class=""  enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-12">
        <div class="container">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black"> <i class="fas fa-fw fa-plus"></i> Ajouter un service</h1>
                </div>
                <div class="card-body container">
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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Logo</label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror" placeholder="file" name="file" id="file" >
                                @error('file') <span class="text-danger">{{$message}}</span> @enderror
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
</div>
@stop