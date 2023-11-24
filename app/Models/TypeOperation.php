<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOperation extends Model
{
    use HasFactory;

    protected $fillable = [
    	'libelle', 
	    'fk_service_id', 
	    'fk_sup_id',
	    'fk_up_id',
	];

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
