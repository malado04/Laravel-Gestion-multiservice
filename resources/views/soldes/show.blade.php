@extends('adminlte::page')
@section('title', 'Affichage solde')  
@section('content')<br>
    <div class="row">
        <div class="col-12">    
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black"> <i class="img-circle p-2 fas fa-fw fa-info border border-white"></i>  {{$cai->libelle}} 
                        <a href="{{route('caisses.index')}}" class="m-3 btn btn-success" style="float: right;">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <i class="fas fa-list"></i> Liste des caisses
                        </a>
                        <a href="{{route('caisses.show', $cai)}}" class="m-3 btn btn-danger" style="float: right;">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <i class="fas fa-list"></i> Retour
                        </a>
                    </h1>
                </div>
               <div class="card-body"> 
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                      <fieldset class="container  bg-warning p-4">
                            <form action="{{route('soldes.store')}}" method="post" >
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Montant</label>
                                    <input type="number" name="montant" min="0" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Service</label>
                                    <select class="form-control" name="fk_service_id">
                                        @foreach($servs as $key => $serv)
                                            <option value="{{$serv->id}}">{{$serv->libelle}}</option>
                                        @endforeach
                                    </select> 
                                </div>
                                <div class="col-md-4">
                                    <label>Opération</label>
                                    <select class="form-control" name="operation">
                                        <optgroup label="Retrait">
                                            <option value="Retrait">Retrait</option>
                                        </optgroup>
                                        <optgroup label="Depot">
                                            <option value="Depot">Dépot</option>
                                        </optgroup>
                                        <optgroup label="Retrait avec code">
                                            <option value="Retrait avec code">Retrait avec code</option>
                                        </optgroup>
                                        <optgroup label="Depot avec code">
                                            <option value="Depot avec code">Dépot avec code</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div><br>
                            <input type="hidden" name="fk_caisse_id" value="{{$cai->id}}">
                            <input type="hidden" name="fk_solde_id" value="{{$sol->id}}">
                            <input type="submit" name="" value="Enregistrer" class="form-control bg-white text-warning">
                        </form>
                        </fieldset>
                      
                    </div>
                </div> <br><br>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset class="container border-warning" style="border: 1px solid; border-radius: 3px">
                            <legend class="bg-dark p-2 text-white" style="width: 50%; border-radius: 3px;">Dépot : 
                                     {{$sum_opdes}}
                              </legend>
                                <table class="table table-hover table-bordered table-stripped" id="example1">
                                       <thead>
                                           <th>Service</th>
                                           <th>Montant</th>
                                           <!-- <th>Commission</th> -->
                                           <th>Opération</th>
                                       </thead>
                                       <tbody>
                                        @foreach($opdes as $key => $op)
                                        <tr>
                                            <td>{{optional($op->service)->libelle}}</td>
                                            <td>{{$op->montant}}</td>
                                            <!-- <td>{{$op->operation}}</td> -->
                                            <td>{{$op->operation}}</td>
                                        </tr>
                                        @endforeach
                                       </tbody>
                                   </table>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="container border-warning" style="border: 1px solid; border-radius: 3px">
                            <legend class="bg-dark p-2 text-white" style="width: 50%; border-radius: 3px;">Retrait :
                                    {{$sum_opres}}
                            </legend>
                                <table class="table table-hover table-bordered table-stripped" id="example2">
                                       <thead>
                                           <th>Service</th>
                                           <th>Montant</th>
                                           <!-- <th>Commission</th> -->
                                           <th>Opération</th>
                                       </thead>
                                       <tbody>
                                        @foreach($opres as $key => $op)
                                        <tr>
                                            <td>{{optional($op->service)->libelle}}</td>
                                            <td>{{$op->montant}}</td>
                                            <!-- <td>{{$op->operation}}</td> -->
                                            <td>{{$op->operation}}</td>
                                        </tr>
                                        @endforeach
                                       </tbody>
                                   </table>
                        </fieldset>
                    </div>
                </div>
                </div>
                <div class="card-footer">
                    <!-- <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Enregistrer</button> -->
                    
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example1').DataTable({
            "responsive": true,
        });

        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush