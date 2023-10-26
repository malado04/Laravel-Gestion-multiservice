<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;
    
    protected $fillable = [
    	'montant', 
	    'operation', 
	    'commission', 
	    'fk_service_id', 
	    'fk_solde_id', 
	    'fk_caisse_id', 
	    'fk_sup_id',
	    'fk_up_id',
	];

    public function solde()
    {
        return $this->belongsTo(Solde::class, 'fk_solde_id', 'id');
    }

    public function caisse()
    {
        return $this->belongsTo(Caisse::class, 'fk_caisse_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'fk_service_id', 'id');
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
