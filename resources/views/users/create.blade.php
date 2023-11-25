@extends('adminlte::page')

@section('title', ' Ajouter un agent')

@section('content')<br>
    <form action="{{route('users.store')}}" method="post" class="container-fluid">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h2 class="m-0 text-black"><i class="fa fa-plus"> </i><i class="fa fa-user"> </i>  Employer !</h2>
                </div>
                <div class="card-body">
                   <fieldset>
                       <legend class="card-header bg-dark text-white">Informations personnelles</legend>
                        <div class="row">
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Nom <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="" placeholder="Nom" name="name" value="{{old('name')}}" required>
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Prénom <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="" placeholder="Prénom" name="prenom" value="{{old('prenom')}}" required>
                                @error('prenom') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">CNI <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="number" class="form-control @error('cni') is-invalid @enderror" id="" placeholder="CNI" name="cni" value="{{old('cni')}}" required>
                                @error('cni') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Date de naissance <span><sup class="text-danger">(*)</sup></span></label>
                                <input id="datefield" type="date" class="form-control @error('date_naissance') is-invalid @enderror" placeholder="Date de naissance" name="date_naissance" value="{{old('date_naissance')}}" max="" required>
                                @error('date_naissance') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Lieu de naissance <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="text" class="form-control @error('lieu_naissance') is-invalid @enderror" id="" placeholder="lieu_naissance" name="lieu_naissance" value="{{old('lieu_naissance')}}" required>
                                @error('lieu_naissance') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                         <!--    <div class="form-group">
                                <label for="">Age <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="number" class="form-control @error('age') is-invalid @enderror" id="" placeholder="Age" name="age" value="{{old('age')}}" required>
                                @error('age') <span class="text-danger">{{$message}}</span> @enderror
                            </div> -->
                            <div class="form-group">
                                <label for="">Téléphone <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="number" class="form-control @error('tel') is-invalid @enderror" id="" placeholder="Téléphone" name="tel" value="{{old('tel')}}" required>
                                @error('tel') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Adresse <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="" placeholder="Adresse" name="adresse" value="{{old('adresse')}}" required>
                                @error('adresse') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Genre <span><sup class="text-danger">(*)</sup></span></label>
                                <select class="form-control @error('genre') is-invalid @enderror" id="" placeholder="Genre" name="genre" >
                                    <optgroup label="Masculin">
                                        <option value="M">Masculin</option>
                                    </optgroup>
                                    <optgroup label="Féminin">
                                        <option value="F">Féminin</option>
                                    </optgroup>
                                </select>
                                @error('genre') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Situation matrimoniale <span><sup class="text-danger">(*)</sup></span></label>
                                <select class="form-control @error('situa_matrim') is-invalid @enderror" id="" placeholder="situa_matrim" name="situa_matrim" >
                                    <optgroup label="Marié (e)">
                                        <option value="Marié (e)">Marié (e)</option>
                                    </optgroup>
                                    <optgroup label="Célibataire">
                                        <option value="Célibataire">Célibataire</option>
                                    </optgroup>
                                </select>
                                @error('situa_matrim') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Nombre d'épouses <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="number" class="form-control @error('nmbr_epouse') is-invalid @enderror" id="" placeholder="Nombre d'épouses" name="nmbr_epouse" value="{{old('nmbr_epouse')}}" required>
                                @error('nmbr_epouse') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Nombre d'enfants <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="number" class="form-control @error('nmbr_enfant') is-invalid @enderror" id="" placeholder="Nombre d'enfants" name="nmbr_enfant" value="{{old('nmbr_enfant')}}" required>
                                @error('nmbr_enfant') <span class="text-danger">{{$message}}</span> @enderror
                            </div> -->
                        </div>
                    </div>
                   </fieldset>
<br>
                   <fieldset>
                       <legend class="card-header bg-dark text-white">Informations sur la personne à contacter</legend>
                        <div class="row">
                        <div class="col-md-3"><br> 
                            <div class="form-group">
                                <label for="">Nom  <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="text" class="form-control @error('nmbr_enfant') is-invalid @enderror" id="" placeholder="Nom" name="nom_cntct" value="{{old('nom_cntct')}}" required>
                                @error('nom_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Prénom  <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="text" class="form-control @error('prenom_cntct') is-invalid @enderror" id="" placeholder="Prénom contact" name="prenom_cntct" value="{{old('prenom_cntct')}}" required>
                                @error('prenom_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Téléphone  <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="number" class="form-control @error('tel_cntct') is-invalid @enderror" id="" placeholder="Téléphone contact" name="tel_cntct" value="{{old('tel_cntct')}}" required>
                                @error('tel_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div>                        
                            </div>                        
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Adresse  <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="text" class="form-control @error('adresse_cntct') is-invalid @enderror" id="" placeholder="Adresse contact" name="adresse_cntct" value="{{old('adresse_cntct')}}" required>
                                @error('adresse_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                    </div>
                   </fieldset>
                 
                   <fieldset>
                       <legend class="card-header bg-dark text-white">Informations professionnelles</legend>
                        <div class="row">
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="exampleInputEmail">Point de vente d'affectation <span><sup class="text-danger">(*)</sup></span></label>
                                <select name="fk_pdv_id" id="fk_pdv_id" class="form-control">
                                    <?php foreach ($pdvs as $key => $pdv): ?>
                                    <optgroup label="{{optional($pdv->zone)->nom_zone}} - {{$pdv->nom_pdv}}" required>
                                        <option value="{{$pdv->id}}" required>{{$pdv->nom_pdv}}</option>
                                    </optgroup>
                                    <?php endforeach ?>
                                </select>
                                @error('pdv') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Poste occupé  <span><sup class="text-danger">(*)</sup></span></label>
                                <select name="admin" class="form-control">
                                    <optgroup label="Gérant ">
                                        <option value="1">Gérant </option>
                                    </optgroup>
                                    <optgroup label="Agent">
                                        <option value="2">Agent</option>
                                    </optgroup>
                                </select>
                                @error('admin') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                            <div class="form-group">
                                <label for="date_affect">Date d'affectation <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="date" class="form-control @error('date_affect') is-invalid @enderror" id="datefield1" placeholder="Date d'affectation" name="date_affect" value="{{old('date_affect')}}" required>
                                @error('date_affect') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="date_prise_serv">Date de prise de service <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="date" class="form-control @error('date_prise_serv') is-invalid @enderror" id="datefield2" placeholder="Date de prise de service" name="date_prise_serv" value="{{old('date_prise_serv')}}" required>
                                @error('date_prise_serv') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Adresse email professionnel <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="email" class="form-control @error('email_pro') is-invalid @enderror" id="" placeholder="Adresse email professionnel" name="email_pro" value="{{old('email_pro')}}" required>
                                @error('email_pro') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-3"><br> 
                            <div class="form-group">
                                <label for="">Numéro matricule <span><sup class="text-danger"></sup></span></label>
                                <input type="text" class="form-control @error('nmro_matric') is-invalid @enderror" id="" placeholder="Numéro matricule" name="nmro_matric" value="{{old('nmro_matric')}}" >
                                @error('nmro_matric') <span class="text-danger">{{$message}}</span> @enderror
                            </div>                        
                        <!--     <div class="form-group">
                                <label for="">Numéro de décision d'engagement  <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="number" class="form-control @error('nmr_decisio_denga') is-invalid @enderror" id="" placeholder="Numéro de décision d'engagement" name="nmr_decisio_denga" value="{{old('nmr_decisio_denga')}}" required>
                                @error('nmr_decisio_denga') <span class="text-danger">{{$message}}</span> @enderror
                            </div> -->
                            <div class="form-group">
                                <label for="">Date d'engagement <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="date" class="form-control @error('date_denga') is-invalid @enderror" id="datefield3" placeholder="Date  d'engagement" name="date_denga" value="{{old('date_denga')}}" required>
                                @error('date_denga') <span class="text-danger">{{$message}}</span> @enderror
                            </div>      
                        </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Salaire brute <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="number" class="form-control @error('salaire_brute') is-invalid @enderror" id="" placeholder="Salaire brute" name="salaire_brute" value="{{old('salaire_brute')}}" required>
                                @error('salaire_brute') <span class="text-danger">{{$message}}</span> @enderror
                            </div>              
                            <div class="form-group">
                                <label for="">Type de contrat <span><sup class="text-danger">(*)</sup></span></label>
                                <select class="form-control @error('type_contrat') is-invalid @enderror" id="" placeholder="type_contrat" name="type_contrat" required>
                                    <optgroup label="CDI">
                                        <option value="CDI">CDI</option>
                                    </optgroup>
                                    <optgroup label="CDD">
                                        <option value="CDD">CDD</option>
                                    </optgroup>
                                </select>
                                @error('type_contrat') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                           <!--  <div class="form-group">
                                <label for="">Indice <span><sup class="text-danger">(*)</sup></span></label>
                                <input type="number" class="form-control @error('indice') is-invalid @enderror" id="" placeholder="Indice" name="indice" value="{{old('indice')}}" required>
                                @error('indice') <span class="text-danger">{{$message}}</span> @enderror
                            </div>    -->
                            <div class="form-group">
                                <label for="">Niveau d'étude <span><sup class="text-danger">(*)</sup></span></label>
                                <select class="form-control @error('niveau_etud') is-invalid @enderror" id="" placeholder="niveau_etud" name="niveau_etud" required>
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
                   </fieldset>
<br>
                    </div>
                            </div>
                            
                        </fieldset>
                    </div>



                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-5">
                        <button type="submit" class="btn btn-info form-control">Enregistrer l'agent</button></div>
                            <div class="col-md-5">
                        <a href="{{route('users.index')}}" class="btn btn-danger form-control">
                            Annuler l'enregistrement
                        </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <script>
         var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("datefield").setAttribute("max", today);
document.getElementById("datefield1").setAttribute("max", today);
document.getElementById("datefield2").setAttribute("max", today);
document.getElementById("datefield3").setAttribute("max", today);
    </script>
@endpush