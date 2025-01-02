@extends('adminlte::page')
@section('title', 'Inventaire')
@section('content_header')
    <h1 class="m-0 text-dark">
          <b> Inventaire</b>
        <span class="float-right">
        </span>
    </h1>
@stop
@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Inventaire</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-12">
<div class="card-body" id="">
                  <!--   <div class="card-header bg-info"> 
                    </div><br> -->
                     <table class="table table-hover table-bordered table-stripped" id="example0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>PDV </th>
                                <th>Caisse / Guichet </th>
                                <th>Montant Solde </th>
                                <th>Opération</th>
                                <th>Service</th>
                                <th>Montant</th>
                                <th>Commission</th>
                                <th class="btn-outline-success"><i class="fa fa-eye"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($opey as $key => $op)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{optional($op->caisse)->pdv->nom_pdv}}</td>
                                    <td>{{optional($op->caisse)->libelle}}</td>
                                    <td>{{optional($op->solde)->montant}}</td>
                                    <td>{{$op->operation}}</td>
                                    <td style="width: 10%">
                                        <img src="../storage/{{optional($op->service)->file}}" style="width: 30%;" > 
                                        {{optional($op->service)->libelle}}
                                    </td>
                                    <td>{{$op->montant}}</td>
                                    <td>{{$op->commission}}</td>
                                    <td  style="text-align: center;">
                                        <a href="{{route('soldes.show', $op)}}" class="btn btn-outline-success btn-xs">
                                            <i class="fa fa-eye"> </i> 
                                            <i class="fa fa-money-bill"></i>
                                        </a>
                                    </td> 
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
              </div>
            <div class="card"> 
                <div class="card-header bg-dark"> 
                    <h3>Opération quotidien: {{ $opedc}} <button id="btnquo" class="bg-dark border-dark" style="float: right;"><b>+ / -</b></button> </h3>
                </div>
                <div class="card-body" id="quotidien">
                      <?php $i = 1;?>

                  <?php foreach ($services as $key => $value): ?>
                <br>
                    <div class="card-header bg-info"> 
                        <h3>Service: {{ $value->libelle}}</h3>
                    </div><br>
                     <table class="table table-hover table-bordered table-stripped" id="example<?php echo($i); ?>">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>PDV </th>
                                <th>Caisse / Guichet </th>
                                <th>Montant Solde </th>
                                <th>Opération</th>
                                <th>Service</th>
                                <th>Montant</th>
                                <th>Commission</th>
                                <th class="btn-outline-success"><i class="fa fa-eye"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($oped as $key => $op)
                          <?php if ($value->id == $op->fk_service_id): ?>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{optional($op->caisse)->pdv->nom_pdv}}</td>
                                    <td>{{optional($op->caisse)->libelle}}</td>
                                    <td>{{optional($op->solde)->montant}}</td>
                                    <td>{{$op->operation}}</td>
                                    <td style="width: 10%">
                                        <img src="../storage/{{optional($op->service)->file}}" style="width: 30%;" > 
                                        {{optional($op->service)->libelle}}
                                    </td>
                                    <td>{{$op->montant}}</td>
                                    <td>{{$op->commission}}</td>
                                    <td  style="text-align: center;">
                                        <a href="{{route('soldes.show', $op)}}" class="btn btn-outline-success btn-xs">
                                            <i class="fa fa-eye"> </i> 
                                            <i class="fa fa-money-bill"></i>
                                        </a>
                                    </td> 
                                </tr>
                          <?php endif ?>
                        @endforeach
                        </tbody>
                    </table>

                      <?php $i++;?>
                  <?php endforeach ?>
                    </div>
                </div>
             <!--  <div class="card"> 
                <div class="card-header bg-dark"> 
                    <h3>Opération hebdomadaire: {{ $soldec}}  <button id="btnheb" class="bg-dark border-dark" style="float: right;"><b>+ / -</b></button></h3>
                </div>

                <div class="card-body" id="hebdomadaire">
                      <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>PDV </th>
                                <th>Caisse / Guichet </th>
                                <th>Montant Solde </th>
                                <th class="btn-outline-success"><i class="fa fa-eye"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
              </div> -->

              <div class="card"> 
                <div class="card-header bg-dark"> 
                    <h3>Opération mensuel: {{ $opemc}}  <button id="btnmen" class="bg-dark border-dark" style="float: right;"><b>+ / -</b></button></h3>
                </div>

                <div class="card-body" id="mensuel">
                <?php foreach ($services as $key => $value): ?>
                <br>
                    <div class="card-header bg-info"> 
                        <h3>Service: {{ $value->libelle}}</h3>
                    </div><br>
                     <table class="table table-hover table-bordered table-stripped" id="example<?php echo($i); ?>">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>PDV </th>
                                <th>Caisse / Guichet </th>
                                <th>Montant Solde </th>
                                <th>Opération</th>
                                <th>Service</th>
                                <th>Montant</th>
                                <th>Commission</th>
                                <th class="btn-outline-success"><i class="fa fa-eye"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($opem as $key => $op)
                          <?php if ($value->id == $op->fk_service_id): ?>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{optional($op->caisse)->pdv->nom_pdv}}</td>
                                    <td>{{optional($op->caisse)->libelle}}</td>
                                    <td>{{optional($op->solde)->montant}}</td>
                                    <td>{{$op->operation}}</td>
                                    <td style="width: 10%">
                                        <img src="../storage/{{optional($op->service)->file}}" style="width: 30%;" > 
                                        {{optional($op->service)->libelle}}
                                    </td>
                                    <td>{{$op->montant}}</td>
                                    <td>{{$op->commission}}</td>
                                    <td  style="text-align: center;">
                                        <a href="{{route('soldes.show', $op)}}" class="btn btn-outline-success btn-xs">
                                            <i class="fa fa-eye"> </i> 
                                            <i class="fa fa-money-bill"></i>
                                        </a>
                                    </td> 
                                </tr>
                          <?php endif ?>
                        @endforeach
                        </tbody>
                    </table>

                      <?php $i++;?>
                  <?php endforeach ?>
                </div>
              </div>

              <!-- <div class="card"> 
                <div class="card-header bg-dark"> 
                    <h3>Opération trimestriel: {{ $soldec}}  <button id="btntrim" class="bg-dark border-dark" style="float: right;"><b>+ / -</b></button></h3>
                </div>

                <div class="card-body" id="trimestriel">
                      <table class="table table-hover table-bordered table-stripped" id="example3">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>PDV </th>
                                <th>Caisse / Guichet </th>
                                <th>Montant Solde </th>
                                <th class="btn-outline-success"><i class="fa fa-eye"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
              </div>

              <div class="card"> 
                <div class="card-header bg-dark"> 
                    <h3>Opération semetriel: {{ $soldec}} <button id="btnsem" class="bg-dark border-dark" style="float: right;"><b>+ / -</b></button></h3>
                </div>

                <div class="card-body" id="semetriel">
                      <table class="table table-hover table-bordered table-stripped" id="example4">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>PDV </th>
                                <th>Caisse / Guichet </th>
                                <th>Montant Solde </th>
                                <th class="btn-outline-success"><i class="fa fa-eye"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

              </div> -->
              <div class="card"> 
                <div class="card-header bg-dark"> 
                    <h3>Opération annuel: {{ $opeyc}}  <button id="btnann" class="bg-dark border-dark" style="float: right;"><b>+ / -</b></button></h3>
                </div>

                <div class="card-body" id="annuel">
                <?php foreach ($services as $key => $value): ?>
                <br>
                    <div class="card-header bg-info"> 
                        <h3>Service: {{ $value->libelle}}</h3>
                    </div><br>
                     <table class="table table-hover table-bordered table-stripped" id="example<?php echo($i); ?>">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>PDV </th>
                                <th>Caisse / Guichet </th>
                                <th>Montant Solde </th>
                                <th>Opération</th>
                                <th>Service</th>
                                <th>Montant</th>
                                <th>Commission</th>
                                <th class="btn-outline-success"><i class="fa fa-eye"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($opey as $key => $op)
                          <?php if ($value->id == $op->fk_service_id): ?>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{optional($op->caisse)->pdv->nom_pdv}}</td>
                                    <td>{{optional($op->caisse)->libelle}}</td>
                                    <td>{{optional($op->solde)->montant}}</td>
                                    <td>{{$op->operation}}</td>
                                    <td style="width: 10%">
                                        <img src="../storage/{{optional($op->service)->file}}" style="width: 30%;" > 
                                        {{optional($op->service)->libelle}}
                                    </td>
                                    <td>{{$op->montant}}</td>
                                    <td>{{$op->commission}}</td>
                                    <td  style="text-align: center;">
                                        <a href="{{route('soldes.show', $op)}}" class="btn btn-outline-success btn-xs">
                                            <i class="fa fa-eye"> </i> 
                                            <i class="fa fa-money-bill"></i>
                                        </a>
                                    </td> 
                                </tr>
                          <?php endif ?>
                        @endforeach
                        </tbody>
                    </table>
                      <?php $i++;?>
                  <?php endforeach ?>
              </div>
            </div>
        </div>
    </div>
@stop

@push('js')
 
    <script>
      $(document).ready(function(){
           $("#quotidien").hide(); 
           $("#hebdomadaire").hide(); 
           $("#mensuel").hide(); 
           $("#trimestriel").hide(); 
           $("#semetriel").hide(); 
           $("#annuel").hide(); 

           $('#btnquo').click(function(){
               $("#quotidien").slideToggle();
               $("#hebdomadaire").hide(); 
               $("#mensuel").hide(); 
               // $('#btnquo').text('-');
               $("#trimestriel").hide(); 
               $("#semetriel").hide(); 
               $("#annuel").hide(); 
           });

           $('#btnheb').click(function(){
                $("#hebdomadaire").slideToggle(); 
               $("#quotidien").hide(); 
               $("#mensuel").hide(); 
               $("#trimestriel").hide(); 
               $("#semetriel").hide(); 
               $("#annuel").hide(); 
           });

           $('#btnmen').click(function(){
               $("#mensuel").slideToggle();
           $("#quotidien").hide(); 
           $("#hebdomadaire").hide(); 
           $("#trimestriel").hide(); 
           $("#semetriel").hide(); 
           $("#annuel").hide(); 
           });

           $('#btntrim').click(function(){
               $("#trimestriel").slideToggle();
           $("#quotidien").hide(); 
           $("#hebdomadaire").hide(); 
           $("#mensuel").hide(); 
           $("#semetriel").hide(); 
           $("#annuel").hide(); 
           });

           $('#btnsem').click(function(){
               $("#semetriel").slideToggle();
           $("#quotidien").hide(); 
           $("#hebdomadaire").hide(); 
           $("#mensuel").hide(); 
           $("#trimestriel").hide(); 
           $("#annuel").hide(); 
           });

           $('#btnann').click(function(){
               $("#annuel").slideToggle();
           $("#quotidien").hide(); 
           $("#hebdomadaire").hide(); 
           $("#mensuel").hide(); 
           $("#trimestriel").hide(); 
           $("#semetriel").hide(); 
           });


       });

        $('#example1').DataTable({
            "responsive": true,
        });
        $('#example2').DataTable({
            "responsive": true,
        });
        $('#example3').DataTable({
            "responsive": true,
        });
        $('#example4').DataTable({
            "responsive": true,
        });
        $('#example5').DataTable({
            "responsive": true,
        });
        $('#example6').DataTable({
            "responsive": true,
        });
        $('#example7').DataTable({
            "responsive": true,
        });
        $('#example8').DataTable({
            "responsive": true,
        });
        $('#example9').DataTable({
            "responsive": true,
        });
        $('#example10').DataTable({
            "responsive": true,
        });
        $('#example11').DataTable({
            "responsive": true,
        });
        $('#example12').DataTable({
            "responsive": true,
        });
        $('#example13').DataTable({
            "responsive": true,
        });
        $('#example14').DataTable({
            "responsive": true,
        });
        $('#example15').DataTable({
            "responsive": true,
        });
        $('#example16').DataTable({
            "responsive": true,
        });
        $('#example0').DataTable({
            "responsive": true,
        });


    </script>
@endpush