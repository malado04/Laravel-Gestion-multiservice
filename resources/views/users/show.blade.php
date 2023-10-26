@extends('adminlte::page')

@section('title', ' Ajouter un agent')

@section('content')<br>
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h2 class="m-0 text-black"><i class="fa fa-plus"> </i><i class="fa fa-user"> </i>  Agent municipal
                    <a href="{{route('users.index')}}" class="btn btn-danger" style="float:right;">
                        Retour
                    </a> 
                    </h2>

                </div>
                <div class="card-body">
                   <fieldset>
                       <legend class="card-header bg-dark text-white">Informations personnelles</legend>
                        <div class="row">
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Nom </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="" placeholder="Nom" name="name"  value="{{$user->name}}" readonly>
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Prénom </label>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="" placeholder="Prénom" name="prenom" value="{{$user->prenom}}" readonly>
                                @error('prenom') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">CNI </label>
                                <input type="number" class="form-control @error('cni') is-invalid @enderror" id="" placeholder="CNI" name="cni" value="{{$user->cni}}" readonly>
                                @error('cni') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Genre </label>
                                <input type="text" class="form-control @error('genre') is-invalid @enderror" id="" name="genre" value="{{$user->genre}}" readonly>

                            </div>
                            <div class="form-group">
                                <label for="">Date de naissance </label>
                                <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" id="" placeholder="Date de naissance" name="date_naissance" value="{{$user->date_naissance}}" readonly>
                                @error('date_naissance') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Lieu de naissance </label>
                                <input type="text" class="form-control @error('lieu_naissance') is-invalid @enderror" id="" placeholder="lieu_naissance" name="lieu_naissance" value="{{$user->lieu_naissance}}" readonly>
                                @error('lieu_naissance') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Age </label>
                                <input type="number" class="form-control @error('age') is-invalid @enderror" id="" placeholder="Age" name="age" value="{{$user->age}}" readonly>
                                @error('age') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Téléphone </label>
                                <input type="number" class="form-control @error('tel') is-invalid @enderror" id="" placeholder="Téléphone" name="tel" value="{{$user->tel}}" readonly>
                                @error('tel') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Adresse </label>
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="" placeholder="Adresse" name="adresse" value="{{$user->adresse}}" readonly>
                                @error('adresse') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Situation matrimoniale </label>
                                <input type="text" class="form-control @error('situa_matrim') is-invalid @enderror" id="" name="situa_matrim" value="{{$user->situa_matrim}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Nombre d'épouses </label>
                                <input type="number" class="form-control @error('nmbr_epouse') is-invalid @enderror" id="" placeholder="Nombre d'épouses" name="nmbr_epouse" value="{{$user->nmbr_epouse}}" readonly>
                                @error('nmbr_epouse') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Nombre d'enfants </label>
                                <input type="number" class="form-control @error('nmbr_enfant') is-invalid @enderror" id="" placeholder="Nombre d'enfants" name="nmbr_enfant" value="{{$user->nmbr_enfant}}" readonly>
                                @error('nmbr_enfant') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                    </div>
                   </fieldset>
<br>
                   <fieldset>
                       <legend class="card-header bg-dark text-white">Informations sur la personne à contacter</legend>
                        <div class="row">
                        <div class="col-md-3"><br> 
                            <div class="form-group">
                                <label for="">Nom  </label>
                                <input type="text" class="form-control @error('nmbr_enfant') is-invalid @enderror" id="" placeholder="Nom" name="nom_cntct" value="{{$user->nom_cntct}}" readonly>
                                @error('nom_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Prénom  </label>
                                <input type="text" class="form-control @error('prenom_cntct') is-invalid @enderror" id="" placeholder="Prénom contact" name="prenom_cntct" value="{{$user->prenom_cntct}}" readonly>
                                @error('prenom_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Téléphone  </label>
                                <input type="number" class="form-control @error('tel_cntct') is-invalid @enderror" id="" placeholder="Téléphone contact" name="tel_cntct" value="{{$user->tel_cntct}}" readonly>
                                @error('tel_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div>                        
                            </div>                        
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Adresse  </label>
                                <input type="text" class="form-control @error('adresse_cntct') is-invalid @enderror" id="" placeholder="Adresse contact" name="adresse_cntct" value="{{$user->adresse_cntct}}" readonly>
                                @error('adresse_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                    </div>
                   </fieldset><br>
                 
                   <fieldset>
                       <legend class="card-header bg-dark text-white">Informations professionnelles</legend>
                        <div class="row">
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="exampleInputEmail">Poste occupé  </label>
                                <select name="admin" class="form-control" readonly>
                                    <?php if ($user->admin ==2): ?>
                                        <option value="Maire">Maire</option>
                                    <?php endif ?>
                                    <?php if ($user->admin ==3): ?>
                                        <option value="Maire délégué">Maire délégué</option>
                                    <?php endif ?>
                                    <?php if ($user->admin ==4): ?>
                                        <option value="Secretaire Municipal">Secretaire Municipal</option>
                                    <?php endif ?>
                                    <?php if ($user->admin ==5): ?>
                                        <option value="Comptable matière">Comptable matière</option>
                                    <?php endif ?>
                                    <?php if ($user->admin ==6): ?>
                                        <option value="Chef de service">Chef de service</option>
                                    <?php endif ?>
                                    <?php if ($user->admin ==7): ?>
                                        <option value="Agent">Agent</option>
                                    <?php endif ?>
                                    <?php if ($user->admin !=2 && $user->admin !=3 && $user->admin !=4 && $user->admin !=5 && $user->admin !=6 && $user->admin !=7): ?>
                                        <option value="{{optional($user->poste)->libelleposte}}">{{optional($user->poste)->libelleposte}}</option>
                                    <?php endif ?>
                                </select>
                                @error('admin') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Service d'affectation  </label>
                                <select name="service_affect" class="form-control">
                                    <?php foreach ($svrcs as $key => $svrc): ?>
                                    <optgroup label="{{$svrc->libelleservice}}" readonly>
                                        <option value="{{$svrc->id}}" readonly>{{$svrc->libelleservice}}</option>
                                    </optgroup>
                                    <?php endforeach ?>
                                </select>
                                @error('service_affect') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="date_affect">Date d'affectation </label>
                                <input type="date" class="form-control @error('date_affect') is-invalid @enderror" id="" placeholder="Date d'affectation" name="date_affect" value="{{$user->date_affect}}" readonly>
                                @error('date_affect') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="date_prise_serv">Date de prise de service </label>
                                <input type="date" class="form-control @error('date_prise_serv') is-invalid @enderror" id="" placeholder="Date de prise de service" name="date_prise_serv" value="{{$user->date_prise_serv}}" readonly>
                                @error('date_prise_serv') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Adresse email professionnel </label>
                                <input type="email" class="form-control @error('email_pro') is-invalid @enderror" id="" placeholder="Adresse email professionnel" name="email_pro" value="{{$user->email_pro}}" readonly>
                                @error('email_pro') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Numéro matricule </label>
                                <input type="text" class="form-control @error('nmro_matric') is-invalid @enderror" id="" placeholder="Numéro matricule" name="nmro_matric" value="{{$user->nmro_matric}}" readonly>
                                @error('nmro_matric') <span class="text-danger">{{$message}}</span> @enderror
                            </div>   
                        </div>
                        <div class="col-md-3"><br>                      
                            <div class="form-group">
                                <label for="">Numéro de décision d'engagement  </label>
                                <input type="number" class="form-control @error('nmr_decisio_denga') is-invalid @enderror" id="" placeholder="Numéro de décision d'engagement" name="nmr_decisio_denga" value="{{$user->nmr_decisio_denga}}" readonly>
                                @error('nmr_decisio_denga') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Date d'engagement </label>
                                <input type="date" class="form-control @error('date_denga') is-invalid @enderror" id="" placeholder="Date  d'engagement" name="date_denga" value="{{$user->date_denga}}" readonly>
                                @error('date_denga') <span class="text-danger">{{$message}}</span> @enderror
                            </div>      
                            <div class="form-group">
                                <label for="">Salaire brute </label>
                                <input type="number" class="form-control @error('salaire_brute') is-invalid @enderror" id="" placeholder="Salaire brute" name="salaire_brute" value="{{$user->salaire_brute}}" readonly>
                                @error('salaire_brute') <span class="text-danger">{{$message}}</span> @enderror
                            </div>              
                        </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Type de contrat </label>
                                <select class="form-control @error('type_contrat') is-invalid @enderror" id="" placeholder="type_contrat" name="type_contrat" readonly>
                                    <optgroup label="CDI">
                                        <option value="CDI">CDI</option>
                                    </optgroup>
                                    <optgroup label="CDD">
                                        <option value="CDD">CDD</option>
                                    </optgroup>
                                </select>
                                @error('type_contrat') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Indice </label>
                                <input type="number" class="form-control @error('indice') is-invalid @enderror" id="" placeholder="Indice" name="indice" value="{{$user->indice}}" readonly>
                                @error('indice') <span class="text-danger">{{$message}}</span> @enderror
                            </div>   
                            <div class="form-group">
                                <label for="">Niveau d'étude </label>
                                <select class="form-control @error('niveau_etud') is-invalid @enderror" id="" placeholder="niveau_etud" name="niveau_etud" readonly>
                                    <optgroup label="BFEM">
                                        <option value="BFEM">BFEM</option>
                                    </optgroup>
                                     <optgroup label="BAC">
                                        <option value="BAC">BAC</option>
                                    </optgroup>
                                     <optgroup label="Licence">
                                        <option value="Licence 1">Licence 1</option>
                                    </optgroup>
                                     <optgroup label="Licence">
                                        <option value="Licence 2">Licence 2</option>
                                    </optgroup>
                                     <optgroup label="Licence">
                                        <option value="Licence 3">Licence 3</option>
                                    </optgroup>
                                    <optgroup label="Master 1">
                                        <option value="Master 1">Master 1</option>
                                    </optgroup>
                                    <optgroup label="Master 2">
                                        <option value="Master 2">Master 2</option>
                                    </optgroup>
                                    <optgroup label="Doctorat">
                                        <option value="Doctorat">Doctorat</option>
                                    </optgroup>
                                </select>
                                @error('niveau_etud') <span class="text-danger">{{$message}}</span> @enderror
                            </div>                        
                        </div>
                    </div>
                   </fieldset> <br>
                   <fieldset class="">
                       <legend class="card-header bg-dark text-white">Informations sur les cotisations</legend>
                        
                        <div class="row">
                            <div class="col-md-6"><br>
                                <fieldset>
                                    <legend class="card-header bg-dark text-white">IPRES</legend> <br>
                                    
                                      <!--   <div class="form-group">
                                            <label for="">Numéro de l'allocataire cotisations </label>
                                            <input type="number" class="form-control @error('salaire_brute') is-invalid @enderror" id="" placeholder="Numéro de l'allocataire cotisations" name="nmro_alloc_cotisations" value="{{$user->nmro_alloc_cotisations}}" >
                                            @error('nmro_alloc_cotisations') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>              
                                    
                                        <div class="form-group">
                                            <label for="part_mairie">Part employeur </label>
                                            <input type="number" class="form-control @error('part_mairie') is-invalid @enderror" id="" placeholder="Part employeur" name="part_mairie" value="{{$user->part_mairie}}" >
                                            @error('part_mairie') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>              
                                    
                                        <div class="form-group">
                                            <label for="part_empl">Part Employé </label>
                                            <input type="number" class="form-control @error('part_empl') is-invalid @enderror" id="" placeholder="part Employé" name="part_empl" value="{{$user->part_empl}}" >
                                            @error('part_empl') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>              
                                        <div class="form-group">
                                            <label for="total_cotisations">Total cotisations </label>
                                            <input type="number" class="form-control @error('total_cotisations') is-invalid @enderror" id="" placeholder="Total cotisations" name="total_cotisations" value="{{$user->total_cotisations}}" readonly>
                                            @error('total_cotisations') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>  -->             

                                            <table class="table table-hover table-bordered table-stripped " id="example3">
                                                <thead>
                                                    <tr>
                                                        <!-- <th>No.</th> -->
                                                        <!-- <th>Agent  </th> -->
                                                        <!-- <th>Maricule   </th> -->
                                                        <th>Numéro de  <br>l'allocataire  <br>IPRES </th>
                                                        <th>Part employeur </th>
                                                        <th>Part Employé </th>
                                                        <th>Total <br>IPRES </th>
                                                        <th>Date </th>
                                                        <!-- <th class="btn-success"><i class="fa fa-eye"> </i></th>
                                                        <th class="btn-primary"><i class="fa fa-edit"> </i></th>
                                                        <th  class="btn-danger"><i class="fa fa-trash"> </i></th>-->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($cotisation as $key => $ip)
                                                    <tr>
                                                        <!-- <td>{{$key+1}}</td> -->
                                                        <!-- <td>{{optional($ip->agent)->name}} {{optional($ip->agent)->prenom}}</td> -->
                                                        <!-- <td>{{optional($ip->agent)->nmro_matric}}</td> -->
                                                        <td>{{$ip->nmro_alloc_ipress}}</td>
                                                        <td>{{$ip->part_mairie}}</td>
                                                        <td>{{$ip->part_empl}}</td>
                                                        <td>{{$ip->total_ipress}}</td>
                                                        <td>{{$ip->created_at}}</td>
                                                       <!--  <td style="width: 5%;">
                                                            <a href="{{route('cotisations.show', $ip)}}" class="btn btn-success btn-xs">
                                                                <i class="fa fa-eye"> </i>
                                                            </a>
                                                        </td>
                                                        <td style="width: 5%;">
                                                            <a style="text-align:center;" href="{{route('cotisations.edit', $ip)}}" class="btn btn-primary btn-xs">
                                                                <i class="fa fa-edit"> </i>
                                                            </a>
                                                        </td>
                                                        <td style="width: 5%;">
                                                            <a style="float: right;" href="{{route('cotisations.destroy', $ip)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                                                <i class="fa fa-trash"> </i>
                                                            </a>
                                                        </td> -->
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                </fieldset>
                            </div>
                            <div class="col-md-6"><br>
                                <fieldset>
                                    <legend class="card-header bg-dark text-white">CAISSE</legend><br> 
                                    
                                      <!--   <div class="form-group">
                                            <label for="">Numéro de l'allocataire CAISSE </label>
                                            <input type="number" class="form-control @error('salaire_brute') is-invalid @enderror" id="" placeholder="Numéro de l'allocataire CAISSE" name="nmro_alloc_cotisations" value="{{$user->nmro_alloc_cotisations}}" >
                                            @error('nmro_alloc_cotisations') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>              
                                    
                                        <div class="form-group">
                                            <label for="">CSS/AT </label>
                                            <input type="number" class="form-control @error('css_at') is-invalid @enderror" id="" placeholder="CSS/AT" name="css_at" value="{{$user->css_at}}" >
                                            @error('css_at') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>              
                                    
                                        <div class="form-group">
                                            <label for="">CSS/AF </label>
                                            <input type="number" class="form-control @error('css_af') is-invalid @enderror" id="" placeholder="CSS/AF" name="css_af" value="{{$user->css_af}}" >
                                            @error('css_af') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>              
                                        <div class="form-group">
                                            <label for="">Total CAISSE </label>
                                            <input type="number" class="form-control @error('total_caisse') is-invalid @enderror" id="" placeholder="Total CAISSE" name="total_caisse" value="{{$user->total_caisse}}" readonly>
                                            @error('total_caisse') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>  -->
                                            <table class="table table-hover table-bordered table-stripped " id="example4">
                                                <thead>
                                                <tr>
                                                    <!-- <th>No.</th> -->
                                                    <th>Numéro de <br> l'allocataire  <br>CAISSE</th>
                                                    <th>CSS/AT</th>
                                                    <th>CSS/AF</th>
                                                    <th>Total <br>CAISSE</th>
                                                        <th>Date </th>
                                                   <!--  <th class="btn-outline-success text-center"><i class="fa fa-eye"> </i></th>
                                                    <th class="btn-outline-primary text-center"><i class="fa fa-edit"> </i></th>
                                                    <th cla ss="btn-outline-danger text-center"><i class="fa fa-trash"> </i></th>-->
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($cotisation as $key => $ip)
                                                    <tr>
                                                        <!-- <td>{{$key+1}}</td> -->
                                                        <!-- <td>{{optional($ip->agent)->name}} {{optional($ip->agent)->prenom}}</td> -->
                                                        <!-- <td>{{optional($ip->agent)->nmro_matric}}</td> -->
                                                        <td>{{$ip->nmro_alloc_caisse}}</td>
                                                        <td>{{$ip->css_at}}</td>
                                                        <td>{{$ip->css_af}}</td>
                                                        <td>{{$ip->total_caisse}}</td>
                                                        <td>{{$ip->created_at}}</td>
                                                       <!--  <td style="width: 5%;">
                                                            <a href="{{route('cotisations.show', $ip)}}" class="btn btn-success btn-xs">
                                                                <i class="fa fa-eye"> </i>
                                                            </a>
                                                        </td>
                                                        <td style="width: 5%;">
                                                            <a style="text-align:center;" href="{{route('cotisations.edit', $ip)}}" class="btn btn-primary btn-xs">
                                                                <i class="fa fa-edit"> </i>
                                                            </a>
                                                        </td>
                                                        <td style="width: 5%;">
                                                            <a style="float: right;" href="{{route('cotisations.destroy', $ip)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                                                <i class="fa fa-trash"> </i>
                                                            </a>
                                                        </td> -->
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                </table>
                                </fieldset>
                            </div>
                            <div class="col-md-6"><br>
                                <fieldset>
                                    <legend class="card-header bg-dark text-white">Impot</legend><br>
                                    <!--     <div class="form-group">
                                            <label for="">TRIMF </label>
                                            <input type="number" class="form-control @error('trimf') is-invalid @enderror" id="" placeholder="TRIMF" name="trimf" value="{{$user->trimf}}" >
                                            @error('trimf') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>              
                                        <div class="form-group">
                                            <label for="">IR </label>
                                            <input type="number" class="form-control @error('ir') is-invalid @enderror" id="" placeholder="IR" name="ir" value="{{$user->ir}}" >
                                            @error('ir') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>  -->
                                            <table class="table table-hover table-bordered table-stripped " id="example5">
                                                <thead>
                                                <tr>
                                                    <!-- <th>No.</th> -->
                                                    <th>TRIMF  </th>
                                                    <th>IR</th>
                                                    <th>Date </th>
                                                   <!--  <th class="btn-outline-success text-center"><i class="fa fa-eye"> </i></th>
                                                    <th class="btn-outline-primary text-center"><i class="fa fa-edit"> </i></th>
                                                    <th class="btn-outline-danger text-center"><i class="fa fa-trash"> </i></th> -->
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($cotisation as $key => $ip)
                                                    <tr>
                                                        <!-- <td>{{$key+1}}</td> -->
                                                        <!-- <td>{{optional($ip->agent)->name}} {{optional($ip->agent)->prenom}}</td> -->
                                                        <!-- <td>{{optional($ip->agent)->nmro_matric}}</td> -->
                                                        <td>{{$ip->trimf}}</td>
                                                        <td>{{$ip->ir}}</td>
                                                        <td>{{$ip->created_at}}</td>
                                                       <!--  <td style="width: 5%;">
                                                            <a href="{{route('cotisations.show', $ip)}}" class="btn btn-success btn-xs">
                                                                <i class="fa fa-eye"> </i>
                                                            </a>
                                                        </td>
                                                        <td style="width: 5%;">
                                                            <a style="text-align:center;" href="{{route('cotisations.edit', $ip)}}" class="btn btn-primary btn-xs">
                                                                <i class="fa fa-edit"> </i>
                                                            </a>
                                                        </td>
                                                        <td style="width: 5%;">
                                                            <a style="float: right;" href="{{route('cotisations.destroy', $ip)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                                                <i class="fa fa-trash"> </i>
                                                            </a>
                                                        </td> -->
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                </table>
                                </fieldset>
                            </div>
                        </div>
                    </fieldset> 
                      <fieldset>
                            <div class="row">
                                <div class="col-md-6">
                    <br>
                                    <fieldset class="">
                                       <legend class="card-header bg-dark text-white">Informations sur les retenues</legend>
                                       <table class="table table-hover table-bordered table-stripped " id="example3">
                                                <thead>
                                                    <tr> 
                                                        <th>Libelle</th>
                                                        <th>Montant</th>
                                                        <th>Date </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($retenues as $key => $re)
                                                    <tr>
                                                        <td>{{$re->libelle_ret}}</td>
                                                        <td>{{$re->montant_ret}}</td>
                                                        <td>{{$re->date_ret}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                   </fieldset> 
                                </div>
                                <div class="col-md-6">
                                    <br>
                                   <fieldset class="">
                                       <legend class="card-header bg-dark text-white">Informations sur les imdemnités</legend>
                                       <table class="table table-hover table-bordered table-stripped " id="example3">
                                                <thead>
                                                    <tr>
                                                        <th>Libelle</th>
                                                        <th>Montant</th>
                                                        <th>Date </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($indemnites as $key => $ind)
                                                    <tr> 
                                                        <td>{{$ind->libelle_indem}}</td>
                                                        <td>{{$ind->montant_indem}}</td>
                                                        <td>{{$ind->date_indem}}</td> 
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                      
                                   </fieldset> 
                                </div>
                                <div class="col-md-6">
                                       <br>
                                       <fieldset class="">
                                           <legend class="card-header bg-dark text-white">Informations sur les primes</legend>
                                       <table class="table table-hover table-bordered table-stripped " id="example3">
                                                <thead>
                                                    <tr>
                                                        <th>Libelle</th>
                                                        <th>Montant</th>
                                                        <th>Date </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($primes as $key => $pri)
                                                    <tr>
                                                        <td>{{$pri->libelle_prime}}</td>
                                                        <td>{{$pri->montant_prime}}</td>
                                                        <td>{{$pri->date_prime}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            
                                       </fieldset> 
                                </div>
                            </div>
                            
                        </fieldset>
                    </div>
             <!--    <div class="card-footer ">
                    <div class="row">
                       <div class="col-md-3">
                    <button type="submit" class="btn btn-info form-control">Enregistrer l'agent</button></div> 
                        <div class="col-md-3">
                    <a href="{{route('users.index')}}" class="btn btn-danger form-control">
                        Annuler l'enregistrement
                    </a></div>
                    </div>
                </div> -->
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script>
        $('#example3').DataTable({
            "responsive": true,
        });
        $('#example4').DataTable({
            "responsive": true,
        });
        $('#example5').DataTable({
            "responsive": true,
        });
    </script>
@endpush