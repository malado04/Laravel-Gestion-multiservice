@extends('adminlte::page')

@section('title', ' Ajouter un caisse')

@section('content')<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black"> <i class="fas fa-fw fa-plus"></i> Solde caisse</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('operation.update', $operation)}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Montant</label>
                                    <input type="number" name="montant" min="0" class="form-control" required="">
                                </div>
                                <div class="col-md-4">
                                    <label>Service </label>
                                    <select class="form-control" name="fk_service_id" required="">
                                        @foreach($servs as $key => $serv)
                                                <!-- <img src="../storage/{{$serv->file}}"> -->
                                            <option value="{{$serv->id}}">
                                                {{$serv->libelle}}
                                            </option>
                                        @endforeach
                                    </select> 
                                </div>
                                <div class="col-md-4">
                                    <label>Opération</label>
                                    <select class="form-control" name="operation" required="">
                                        <optgroup label="Retrait">
                                            <option value="Retrait">Retrait</option>
                                        </optgroup>
                                        <optgroup label="Depot">
                                            <option value="Depot">Dépot</option>
                                        </optgroup>
                                        <optgroup label="Retrait international">
                                            <option value="Retrait international">Retrait international</option>
                                        </optgroup>
                                        <optgroup label="Depot international">
                                            <option value="Depot international">Dépot international</option>
                                        </optgroup>
                                        <optgroup label="Retrait avec code">
                                            <option value="Retrait avec code">Retrait avec code</option>
                                        </optgroup>
                                        <optgroup label="Depot avec code">
                                            <option value="Depot avec code">Dépot avec code</option>
                                        </optgroup>
                                        <optgroup label="Vente de crédit">
                                            <option value="Vente de crédit">Vente de crédit</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div><br>
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