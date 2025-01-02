@extends('adminlte::page')
@section('title', 'Tableau de bord')
@section('content_header')
    <h4 class="m-0 text-dark">
          <b> Tableau de bord</b>
        <span class="float-right">
        </span>
    </h4>
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
              <li class="breadcrumb-item active">Tableau de bord</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card"> 
                <div class="card-header bg-info"> 
                    <h3>Personnels: effectif </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xsm-3 col-lg-3 ">
                            <fieldset class="border border-info text-info p-3" style=" border-radius: 15px;height: 145px;">
                                <legend class="border bg-inline-info p-2" style="width:55%; margin-left: 1%; border-radius: 15px;"><h4 class=" text-left"><span class="p-2">{{ $users}} </span> </h4><i style="width:25%;" class="fas fa-fw fa-user float-right"></i></legend>
                                <h5><b>Utilisateurs</b></h5>
                            </fieldset>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xsm-3 col-lg-3 ">
                            <fieldset class="border border-info text-info p-3" style=" border-radius: 15px;height: 145px;">
                                <legend class="border bg-inline-info p-2" style="width:55%; margin-left: 1%; border-radius: 15px;"><h4 class=" text-left"><span class="p-2">{{ $adm}} </span> </h4><i style="width:25%;" class="fas fa-fw fa-user float-right"></i></legend>
                                <h5><b>Proprietaire</b></h5>
                            </fieldset>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xsm-3 col-lg-3 ">
                            <fieldset class="border border-info text-info p-3" style=" border-radius: 15px;height: 145px;">
                                <legend class="border bg-inline-info p-2" style="width:55%; margin-left: 1%; border-radius: 15px;"><h4 class=" text-left"><span class="p-2">{{ $sups}} </span> </h4><i style="width:25%;" class="fas fa-fw fa-user float-right"></i></legend>
                                <h5><b>Superviseurs</b></h5>
                            </fieldset>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xsm-3 col-lg-3 ">
                            <fieldset class="border border-info text-info p-3" style=" border-radius: 15px;height: 145px;">
                                <legend class="border bg-inline-info p-2" style="width:55%; margin-left: 1%; border-radius: 15px;"><h4 class=" text-left"><span class="p-2">{{ $agents}} </span> </h4><i style="width:25%;" class="fas fa-fw fa-user float-right"></i></legend>
                                <h5><b>Agent</b></h5>
                            </fieldset>
                        </div>
                         
                    </div>
                </div>
            </div> <br>

            <div class="card"> 
                <div class="card-header bg-info"> 
                    <h3>Nombre de Services : {{ $servi}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                      <?php foreach ($services as $key => $value): ?>
                            <div class="col-md-3 col-sm-3 col-xsm-3 col-lg-3 ">
                              <fieldset class="border border-info text-info p-3" style=" border-radius: 15px;height: 145px;">
                              <legend class="border bg-inline-info p-2" style="width:55%; margin-left: 1%; border-radius: 15px;">
                                  <a href="/services/{{$value->id}}" style="width: 100%; height: 100%;">
                                      <h4 class=" text-left">
                                      <span class="p-2">
                                        <img src="storage/{{$value->file}}" style="width: 25%;"> 
                                      </span> 
                                    </h4><i style="width:25%;" class="fas fa-fw fa-user float-right"></i>
                                  </a>
                                </legend>
                                    <h5><b>{{ $value->libelle}} </b></h5>
                              </fieldset>
                          </div> 
                      <?php endforeach ?>
                    </div>
                </div>
            </div>
            <br>

            <div class="card"> 
                <div class="card-header bg-info"> 
                    <h3>Nombre de Poins de ventes : {{ $pdvsc}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                      <?php foreach ($pdvs as $key => $value): ?>
                            <div class="col-md-3 col-sm-3 col-xsm-3 col-lg-3 ">
                              <fieldset class="border border-info text-info p-3" style=" border-radius: 15px;height: 145px;">
                              <legend class="border bg-inline-info p-2" style="width:85%; margin-left: 1%; border-radius: 15px;">
                                    <h4 class=" text-left">
                                        {{ $value->nom_pdv}}
                                    </h4><i style="width:25%;" class="fas fa-fw fa-cash-register float-right"></i>
                                  </a>
                                </legend>
                                    <h5><b> Zone : {{ optional($value->zone)->nom_zone}} </b></h5>
                              </fieldset>
                          </div> 
                      <?php endforeach ?>
                    </div>
                </div>
            </div>

            <div class="card"> 
                <div class="card-header bg-info"> 
                    <h3>Nombre de caisses : {{ $caissesc}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                      <?php foreach ($caisses as $key => $value): ?>
                            <div class="col-md-3 col-sm-3 col-xsm-3 col-lg-3 ">
                              <fieldset class="border border-info text-info p-3" style=" border-radius: 15px;height: 175px;">
                              <legend class="border bg-inline-info p-2" style="width:85%; margin-left: 1%; border-radius: 15px;">
                                    <h4 class=" text-left">
                                        {{ $value->libelle}}
                                    </h4><i style="width:25%;" class="fas fa-fw fa-cash-register float-right"></i>
                                  </a>
                                </legend>
                                    <h5><b> PDV :  {{ optional($value->pdv)->nom_pdv}} </b></h5>
                                    <h5><b> Zone :{{ optional($value->pdv)->zone->nom_zone}} </b></h5>
                              </fieldset>
                          </div> 
                      <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
