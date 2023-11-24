<!-- @extends('adminlte::page')
@section('title', 'Affichage service')  -->
@section('content')<br>
    <div class="row">
        <div class="col-12">    
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black"> <i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> {{optional($cai->pdv)->nom_pdv}} - Soldes de la  {{$cai->libelle }} 
                        <a href="{{route('pdvs.show', optional($cai->pdv)->id)}}" class="btn btn-danger" style="float: right;">
                            <i class="fas fa-list"></i> Retour au Point de vente
                        </a>
                    </h1>
                </div>
               <div class="card-body"> 
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body"> 
                            <table class="table table-hover table-bordered table-stripped" id="example2">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Montant Solde </th>
                                        <th class="btn-success"><i class="fa fa-cash-register"> </i></th>
                                        <th class="btn-danger"><i class="fa fa-close">Fermé </i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sol as $key => $sol)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$sol->montant}}</td>
                                        <td  style="text-align: center;">
                                            <a href="{{route('soldes.show', $sol)}}" class="btn btn-success btn-xs">
                                                <i class="fa fa-cash-register"> </i> 
                                            </a>
                                        </td>
                                        <td  style="text-align: center;">
                                            <a href="{{route('soldes.show', $sol)}}" class="btn btn-danger btn-xs">
                                                <i class="fa fa-times"> </i> 
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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