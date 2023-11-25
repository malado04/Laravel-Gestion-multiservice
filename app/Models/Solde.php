<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solde extends Model
{
    use HasFactory;

    protected $fillable = 
        [
            'id', 
            'montant', 
            'fk_caisse_id', 
            'fk_service_id', 
            'act', 
            'fk_sup_id', 
            'fk_up_id', 
        ];

    // public function solde()
    // {
    //     return $this->belongsTo(Service::class, 'fk_service_id', 'id');
    // }

    public function caisse()
    {
        return $this->belongsTo(Caisse::class, 'fk_caisse_id', 'id');
    }

    public function usersins()
    {
        return $this->belongsTo(User::class, 'fk_sup_id', 'id');
    }

    public function usersup()
    {
        return $this->belongsTo(User::class, 'fk_up_id', 'id');
    }

}




