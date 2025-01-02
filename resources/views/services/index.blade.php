@extends('adminlte::page')

@section('title', 'Liste des services')

@section('content')

    <!-- Bootstrap CSS -->
    <!-- <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> -->
       
    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h1 class="m-0 text-black text-white"><i class="fa fa-list"> </i> Liste des services
                        <a href="{{route('services.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;"> <i class="fa fa-plus"></i>
                             Ajouter un service
                        </a> 
                    </h1>
                </div>
                <div class="card-body"> 
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No.</th>
                                <th>Logo </th>
                                <th>Libelle </th>
                                <th class="btn-outline-success"><i class="fa fa-plus"> </i> Commission</th>
                                <th class="btn-outline-primary"><i class="fa fa-edit"> </i></th>
                                <th class="btn-outline-danger"><i class="fa fa-trash"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $key => $service)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td style="width: 10%;">
                                   <img src="storage/app/{{$service->file}}" style="width: 50%;">
                                </td>
                                <td>{{$service->libelle}}</td>
                                <td style="width: 5%;">
                                    <a href="{{route('services.show', $service)}}" class="btn btn-outline-success btn-xs">
                                        <i class="fa fa-plus"> Commission </i>
                                    </a>
                                </td>
                                <td style="width: 5%;">
                                    <a style="text-align:center;" href="{{route('services.edit', $service)}}" class="btn btn-outline-primary btn-xs">
                                        <i class="fa fa-edit"> </i>
                                    </a>
                                </td>
                                <td style="width: 5%;">
                                    <a style="float: right;" href="{{route('services.destroy', $service)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-outline-danger btn-xs">
                                        <i class="fa fa-trash"> </i>
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