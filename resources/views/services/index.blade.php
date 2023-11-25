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
                                <th>No.</th>
                                <th>Libelle </th>
                                <th class="btn-outline-success"><i class="fa fa-eye"> </i></th>
                                <th class="btn-outline-primary"><i class="fa fa-edit"> </i></th>
                                <th class="btn-outline-danger"><i class="fa fa-trash"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $key => $service)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$service->libelle}}</td>
                                <td style="width: 5%;">
                                    <a href="{{route('services.show', $service)}}" class="btn btn-outline-success btn-xs">
                                        <i class="fa fa-eye"> </i>
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


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    
    <form action="{{route('services.store')}}" method="post" class="container">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h1 class="m-0 text-black text-white"> <i class="fas fa-fw fa-plus"></i> Ajouter un service</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="exampleInputName">Chapitre du service</label>
                                <input type="text" class="form-control @error('chapitre') is-invalid @enderror" id="exampleInputName" placeholder="Chapitre du service" name="chapitre"  id="chapitre" >
                                @error('chapitre') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputName">Code du service</label>
                                <input type="text" class="form-control @error('codeserv') is-invalid @enderror" id="exampleInputName" placeholder="Code du service" name="codeserv"  id="codeserv" >
                                @error('codeserv') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="exampleInputName">Libellé du service</label>
                                <input type="text" class="form-control @error('libelleservice') is-invalid @enderror" id="exampleInputName" placeholder="Libellé du service" name="libelleservice"  id="libelleservice" >
                                @error('libelleservice') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer un service</button>
                    <a href="{{route('services.index')}}" class="btn btn-danger">
                        Annuler
                    </a>
                </div>
    </form>
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