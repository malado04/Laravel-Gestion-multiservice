<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
   
    protected $fillable = [
        'id',
        'name',
        "prenom",
        "cni", 
        "avatar", 
        "genre", 
        "date_naissance",
        "lieu_naissance",
        "age",
        "telpor",
        "adresse", 
        "situa_matrim",
        "nmbr_epouse", 
        "nmbr_enfant",
        "nom_cntct", 
        "prenom_cntct", 
        'tel_cntct',
        'adresse_cntct',
        'admin',
        'dgantenne',
        'date_affect',
        "date_prise_serv",
        "email_pro", 
        "nmro_matric", 
        "nmr_decisio_denga",
        "date_denga",
        "salaire_brute",
        "type_contrat",
        "niveau_etud", 
        "password", 
        "email",
        "fk_service_id", 
        "fk_poste_id", 
        "fk_user_id",
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function poste()
    {
        return $this->belongsTo(Poste::class, 'admin', 'id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'fk_service_id', 'id');
    }

    public function userins()
    {
        return $this->belongsTo(User::class, 'fk_user_id', 'id');
    }

    public function userup()
    {
        return $this->belongsTo(User::class, 'fk_up_id', 'id');
    }
   
    public function getAuthPassword()
    {
     return $this->password;
    } 


    public function adminlte_image()
    {
        return 'images/usim.jpg';
    }

    public function adminlte_desc()
    {
        return 'Séne-Multi-services';
    }

    public function adminlte_profile_url()
    {
        return 'profile';
    }

}
