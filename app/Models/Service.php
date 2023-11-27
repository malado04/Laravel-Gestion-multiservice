<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = 
        [
            'id', 
            'file', 
            'libelle', 
            'fk_sup_id', 
            'fk_up_id', 
        ];

    public function service_mere()
    {
        return $this->belongsTo(Service::class, 'fk_sous_service_id', 'id');
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
