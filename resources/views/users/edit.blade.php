@extends('adminlte::page')

@section('title', 'Edit User')


@section('content')<br>
    <form action="{{route('users.update', $user)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h2 class="m-0 text-black"><i class="fa fa-plus"> </i><i class="fa fa-user"> </i> Employer</h2>
                </div>
                <div class="card-body">
                   <fieldset>
                       <legend class="card-header bg-dark text-white">Informations personnelles</legend>
                        <div class="row">
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Nom </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="" placeholder="Nom" name="name"  value="{{$user->name}}" required>
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Prénom </label>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="" placeholder="Prénom" name="prenom" value="{{$user->prenom}}" required>
                                @error('prenom') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">CNI </label>
                                <input type="number" class="form-control @error('cni') is-invalid @enderror" id="" placeholder="CNI" name="cni" value="{{$user->cni}}" required>
                                @error('cni') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Genre </label>
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
                                <label for="">Date de naissance </label>
                                <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" id="" placeholder="Date de naissance" name="date_naissance" value="{{$user->date_naissance}}" required>
                                @error('date_naissance') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Lieu de naissance </label>
                                <input type="text" class="form-control @error('lieu_naissance') is-invalid @enderror" id="" placeholder="lieu_naissance" name="lieu_naissance" value="{{$user->lieu_naissance}}" required>
                                @error('lieu_naissance') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Téléphone </label>
                                <input type="number" class="form-control @error('tel') is-invalid @enderror" id="" placeholder="Téléphone" name="tel" value="{{$user->tel}}" required>
                                @error('tel') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Adresse </label>
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="" placeholder="Adresse" name="adresse" value="{{$user->adresse}}" required>
                                @error('adresse') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Situation matrimoniale </label>
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
                            <div class="form-group">
                                <label for="">Nombre d'épouses </label>
                                <input type="number" class="form-control @error('nmbr_epouse') is-invalid @enderror" id="" placeholder="Nombre d'épouses" name="nmbr_epouse" value="{{$user->nmbr_epouse}}" required>
                                @error('nmbr_epouse') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Nombre d'enfants </label>
                                <input type="number" class="form-control @error('nmbr_enfant') is-invalid @enderror" id="" placeholder="Nombre d'enfants" name="nmbr_enfant" value="{{$user->nmbr_enfant}}" required>
                                @error('nmbr_enfant') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                    </div>
                   </fieldset><br>
                   <fieldset>
                       <legend class="card-header bg-dark text-white">Informations sur la personne à contacter</legend>
                        <div class="row">
                        <div class="col-md-3"><br> 
                            <div class="form-group">
                                <label for="">Nom  </label>
                                <input type="text" class="form-control @error('nmbr_enfant') is-invalid @enderror" id="" placeholder="Nom" name="nom_cntct" value="{{$user->nom_cntct}}" required>
                                @error('nom_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            </div>
                        <div class="col-md-3"><br> 
                            <div class="form-group">
                                <label for="">Prénom  </label>
                                <input type="text" class="form-control @error('prenom_cntct') is-invalid @enderror" id="" placeholder="Prénom contact" name="prenom_cntct" value="{{$user->prenom_cntct}}" required>
                                @error('prenom_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Téléphone  </label>
                                <input type="number" class="form-control @error('tel_cntct') is-invalid @enderror" id="" placeholder="Téléphone contact" name="tel_cntct" value="{{$user->tel_cntct}}" required>
                                @error('tel_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div>                        
                            </div>                        
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Adresse  </label>
                                <input type="text" class="form-control @error('adresse_cntct') is-invalid @enderror" id="" placeholder="Adresse contact" name="adresse_cntct" value="{{$user->adresse_cntct}}" required>
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
                                <label for="exampleInputEmail">Poste occupé  </label>
                                <select name="admin" class="form-control">
                                    <optgroup label="Maire">
                                        <option value="2">Maire</option>
                                    </optgroup>
                                    <optgroup label="Maire délégué">
                                        <option value="3">Maire délégué</option>
                                    </optgroup>
                                    <optgroup label="Secretaire Municipal">
                                        <option value="4">Secretaire Municipal</option>
                                    </optgroup>
                                    <optgroup label="Comptable matière">
                                        <option value="5">Comptable matière</option>
                                    </optgroup>
                                    <optgroup label="Chef de service">
                                        <option value="6">Chef de service</option>
                                    </optgroup>
                                    <optgroup label="Agent">
                                        <option value="7">Agent</option>
                                    </optgroup>
                                </select>
                                @error('admin') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="date_affect">Date d'affectation </label>
                                <input type="date" class="form-control @error('date_affect') is-invalid @enderror" id="" placeholder="Date d'affectation" name="date_affect" value="{{$user->date_affect}}" required>
                                @error('date_affect') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="date_prise_serv">Date de prise de service </label>
                                <input type="date" class="form-control @error('date_prise_serv') is-invalid @enderror" id="" placeholder="Date de prise de service" name="date_prise_serv" value="{{$user->date_prise_serv}}" required>
                                @error('date_prise_serv') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Adresse email professionnel </label>
                                <input type="email" class="form-control @error('email_pro') is-invalid @enderror" id="" placeholder="Adresse email professionnel" name="email_pro" value="{{$user->email_pro}}" required>
                                @error('email_pro') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Numéro matricule </label>
                                <input type="text" class="form-control @error('nmro_matric') is-invalid @enderror" id="" placeholder="Numéro matricule" name="nmro_matric" value="{{$user->nmro_matric}}" required>
                                @error('nmro_matric') <span class="text-danger">{{$message}}</span> @enderror
                            </div>   
                        </div>
                        <div class="col-md-3"><br>                      
                            <div class="form-group">
                                <label for="">Numéro de décision d'engagement  </label>
                                <input type="number" class="form-control @error('nmr_decisio_denga') is-invalid @enderror" id="" placeholder="Numéro de décision d'engagement" name="nmr_decisio_denga" value="{{$user->nmr_decisio_denga}}" required>
                                @error('nmr_decisio_denga') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Date d'engagement </label>
                                <input type="date" class="form-control @error('date_denga') is-invalid @enderror" id="" placeholder="Date  d'engagement" name="date_denga" value="{{$user->date_denga}}" required>
                                @error('date_denga') <span class="text-danger">{{$message}}</span> @enderror
                            </div>      
                            <div class="form-group">
                                <label for="">Salaire brute </label>
                                <input type="number" class="form-control @error('salaire_brute') is-invalid @enderror" id="" placeholder="Salaire brute" name="salaire_brute" value="{{$user->salaire_brute}}" required>
                                @error('salaire_brute') <span class="text-danger">{{$message}}</span> @enderror
                            </div>              
                        </div>
                        <div class="col-md-3"><br>
                            <div class="form-group">
                                <label for="">Type de contrat </label>
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
                            <div class="form-group">
                                <label for="">Niveau d'étude </label>
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
                    </div>



                <div class="card-footer ">
                    <div class="row">
                        <div class="col-md-3">
                    <button type="submit" class="btn btn-info form-control">Modifier l'agent</button></div>
                        <div class="col-md-3">
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