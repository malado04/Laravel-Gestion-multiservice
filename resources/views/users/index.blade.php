@extends('adminlte::page')

@section('title', 'Liste des uUtilisateurs')

@section('content')<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black"><i class="fa fa-list"> </i> Liste des utilisateurs
                        <a href="{{route('users.create')}}" class="btn btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;"> <i class="fa fa-plus"></i>
                             Ajouter un utilisateur
                        </a>
                </div>
                <div class="card-body">

                    <table class="table table-hover table-bordered table-stripped " id="example2">
                        <thead>
                        <tr>
                            <!-- <th>No.</th> -->
                            <th>Nom et prénom (s)</th>
                            <th>Matricule</th>
                            <th>CNI</th>
                            <th>Tel</th>
                            <th>Email</th>
                            <th>Service</th>
                            <th>Poste </th> 
                            <!-- <th class="btn-outline-success text-center"><i class="fa fa-eye"> </i></th> -->
                            <th class="btn-outline-primary text-center"><i class="fa fa-edit"> </i></th>
                            <th class="btn-outline-danger text-center"><i class="fa fa-trash"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <!-- <td>{{$key+1}}</td> -->
                                <td>{{$user->name}} {{$user->prenom}}</td>
                                <td>{{$user->nmro_matric}}</td>
                                <td>{{$user->cni}}</td>
                                <td>{{$user->telpor}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{optional($user->service)->libelleservice}}</td>
                                <td>
                                    @if ($user->admin == 0)
                                        Admin

                                    @elseif ($user->admin == 1)
                                        Gérant

                                    @elseif ($user->admin == 2)
                                        Chef d'antenne

                                    @elseif ($user->admin == 3)
                                        Employeur

                                    @elseif ($user->admin == 4)                                     
                                        Comptabilite

                                    @elseif ($user->admin == 5)                                     
                                        Secretaire
                                    @endif

                                </td>
                              <!--   <td style="width: 4%;">
                                    <a href="{{route('users.show', $user)}}" class="btn btn btn-outline-success btn btn-outline-xs">
                                        <i class="fa fa-user-secret"> </i>
                                    </a>
                                </td> -->
                                <td style="width: 4%;">
                                    <a href="{{route('users.edit', $user)}}" class="btn btn btn-outline-primary btn btn-outline-xs">
                                        <i class="fa fa-user-edit"> </i>
                                    </a>
                                </td>
                                <td style="width: 4%;">
                                    <a style="float: right;" href="{{route('users.destroy', $user)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn btn-outline-danger btn btn-outline-xs">
                                        <i class="fa fa-user-times"> </i>
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