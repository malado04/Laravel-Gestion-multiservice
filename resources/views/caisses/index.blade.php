@extends('adminlte::page')

@section('title', 'Liste des caisses')

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
                    <h1 class="m-0 text-black text-white"><i class="fa fa-list"> </i> Caisses
                        <a href="{{route('caisses.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;"> <i class="fa fa-plus"></i>
                             Ajouter un caisse
                        </a>
     
                    </h1>
                </div>
                <div class="card-body"> 
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>PDV </th>
                                <th>Libelle </th>
                                <!-- <th class="btn-primary"><i class="fa fa-edit"> </i></th> -->
                                <!-- <th class="btn-danger"><i class="fa fa-trash"> </i></th> -->
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($caisses as $key => $cai)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{optional($cai->pdv)->nom_pdv}}</td>
                                <td>{{$cai->libelle}}</td>
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
    
    <form action="{{route('caisses.store')}}" method="post" class="container">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h1 class="m-0 text-black text-white"> <i class="fas fa-fw fa-plus"></i> Ajouter un caisse</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="exampleInputName">Chapitre du caisse</label>
                                <input type="text" class="form-control @error('chapitre') is-invalid @enderror" id="exampleInputName" placeholder="Chapitre du caisse" name="chapitre"  id="chapitre" >
                                @error('chapitre') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputName">Code du caisse</label>
                                <input type="text" class="form-control @error('codeserv') is-invalid @enderror" id="exampleInputName" placeholder="Code du caisse" name="codeserv"  id="codeserv" >
                                @error('codeserv') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="exampleInputName">Libellé du caisse</label>
                                <input type="text" class="form-control @error('libellecaisse') is-invalid @enderror" id="exampleInputName" placeholder="Libellé du caisse" name="libellecaisse"  id="libellecaisse" >
                                @error('libellecaisse') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer un caisse</button>
                    <a href="{{route('caisses.index')}}" class="btn btn-danger">
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