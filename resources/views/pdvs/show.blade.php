@extends('adminlte::page')

@section('title', 'Affichage citoyen') 
@section('content')<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black"> <i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> {{$pdv->nom_pdv}}
                    </h1>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Zone</label>
                        <input type="text" class="form-control @error('fk_zone_id') is-invalid @enderror" id="exampleInputName" placeholder="Zone" name="fk_zone_id" value="{{optional($pdv->zone)->nom_zone}}" list="pdv_list" readonly="">
                        @error('zone') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-info">
                    <h1 class="m-0 text-black text-white"><i class="fa fa-list"> </i> Caisses
                        <a href="{{route('caisses.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;" > <i class="fa fa-plus"></i>
                             Ajouter un caisse
                        </a>
     
                    </h1>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        @foreach($caisses as $key => $cai)
                           <div class="col-2 btn-default" style="height: 25%;">
                              <h2>
                                   <a href="{{route('caisses.show', $cai)}}" class="btn btn-warning form-control">
                                        <i class="fa fa-edit"> </i> {{$cai->libelle}}
                                        <i class="fa fa-user"></i>
                                    </a>
                              </h2>
                           </div>
                        @endforeach
                    </div>

                </div>
            </div>
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