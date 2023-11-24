<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caisse extends Model
{
    use HasFactory;
    
    protected $fillable = [
    	'libelle', 
	    'fk_pdv_id', 
	    'fk_sup_id',
	    'fk_up_id',
	];

    public function pdv()
    {
        return $this->belongsTo(Pdv::class, 'fk_pdv_id', 'id');
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
