@extends('adminlte::page')

@section('title', 'Modifier un commission')
 
@section('content')<br>
    <form action="{{route('commissions.update', $com)}}" method="post">
        @method('PUT')
        @csrf
    <div class="container">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Commissions : {{optional($com->service)->libelle}}
                     </h3>
                </div>
               <div class="card-body  p-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Type d'opération</label>
                                        <select class="form-control" name="typeoperation">
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
                                    <div class="col-md-3">
                                        <label>Min</label>
                                        <input type="number" name="min" min="0" placeholder="Minimum" class="form-control" required="" value="{{$com->min}}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Max</label>
                                        <input type="number" name="max" min="0" placeholder="Maximum" class="form-control" required="" value="{{$com->max}}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Montant de la commission</label>
                                        <input type="number" step="0.1" required="" name="montant" min="0" placeholder="Montant de la commission" class="form-control" value="{{$com->montant}}">
                                    </div>
                                </div><br>
                                <input type="hidden" name="fk_service_id" value="{{optional($com->service)->id}}">
                                <input type="submit" name="" value="Enregistrer" class="form-control bg-dark text-warning">
    </div>
@stop