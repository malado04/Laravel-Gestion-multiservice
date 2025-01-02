@extends('adminlte::page')
@section('title', 'Listes des zones')

@section('content_header')
@stop

@section('content')
<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black">Listes des zones
                    <a href="{{route('zones.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;">
                        <i class="fas fa-fw fa-plus"></i> Ajouter une zone 
                    </a></h1>
                </div>

                <div class="card-body">
                    <table class="text-center table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nom de la zone</th>
                            <th style="text-align: center;"><i class="fas fa-fw fa-eye"></i></th>
                            <th style="text-align: center;"><i class="fas fa-fw fa-edit"></i></th>
                            <th style="text-align: center;"><i class="fas fa-fw fa-trash"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($zones as $key => $zone)
                            <tr>
                                <td>{{$zone->id}}</td>
                                <td>{{$zone->nom_zone}}</td>
                                <td  style="text-align: center;">
                                    <a href="{{route('zones.show', $zone)}}" class="btn btn-success btn-xs">
                                        <i class="fa fa-eye"> </i> 
                                        <i class="fa fa-user"></i>
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('zones.edit', $zone)}}" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"> </i> 
                                        <i class="fa fa-user"></i>
                                    </a>
                                </td>
                                <td  style="text-align: center;">
                                    <a href="{{route('zones.destroy', $zone)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"> </i>
                                        <i class="fa fa-user"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

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