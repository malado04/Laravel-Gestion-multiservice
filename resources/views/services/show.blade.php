<!-- @extends('adminlte::page')
@section('title', 'Affichage service')  -->
@section('content')<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Service : {{$service->libelle}} </i>
                        <a href="{{route('services.index')}}" class="btn btn-danger" style="float: right;" >
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <i class="fas fa-sign-out"></i> Retour à l'accueil
                        </a>
                        <a href="{{route('commissions.index')}}" class="btn btn-success" style="float: right; margin-right: 2%;" >
                            <i class="fas fa-list"></i> Liste commissions
                        </a>
                     </h3>
                </div>
               <div class="card-body">

                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8 bg-info p-4">
                            <form action="{{route('commissions.store')}}" method="post" >
                            @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Type d'opération</label>
                                        <select class="form-control" name="typeoperation">
                                            <optgroup label="Retrait">
                                                <option value="Retrait">Retrait</option>
                                            </optgroup>
                                            <optgroup label="Depot">
                                                <option value="Depot">Depot</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Min</label>
                                        <input type="number" name="min" min="0" placeholder="Minimum" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Max</label>
                                        <input type="number" name="max" min="0" placeholder="Maximum" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Montant de la commission</label>
                                        <input type="number" step="0.1" required="" name="montant" min="0" placeholder="Montant de la commission" class="form-control">
                                    </div>
                                </div><br>
                                <input type="hidden" name="fk_service_id" value="{{$service->id}}">
                                <input type="submit" name="" value="Enregistrer" class="form-control bg-dark text-warning">
                            </form>
                        </div>
                    </div>
                    <br><br>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Min / Max </th>
                                <th>Commissions </th>
                                <th>Type Opération </th>
                                <th class="btn-success"><i class="fa fa-eye"> </i></th>
                                <th class="btn-primary"><i class="fa fa-edit"> </i></th>
                                <th class="btn-danger"><i class="fa fa-trash"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($commissions as $key => $com)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$com->min}} - {{$com->max}}</td>
                                <td>{{$com->montant}}</td>
                                <td>{{$com->typeoperation}}</td>
                                <td style="width: 5%;">
                                    <a href="{{route('services.show', 1)}}" class="btn btn-success btn-xs">
                                        <i class="fa fa-eye"> </i>
                                    </a>
                                </td>
                                <td style="width: 5%;">
                                    <a style="text-align:center;" href="{{route('services.edit', $service)}}" class="btn btn-primary btn-xs">
                                        <i class="fa fa-edit"> </i>
                                    </a>
                                </td>
                                <td style="width: 5%;">
                                    <a style="float: right;" href="{{route('services.destroy', $service)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"> </i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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