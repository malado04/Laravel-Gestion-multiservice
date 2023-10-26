<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\User;
Use App\Models\Zone;

class Pdv extends Model
{
    use HasFactory;
    
    protected $fillable = ['nom_pdv', 'fk_zone_id', 'fk_sup_id', 'fk_up_id'];


    public function usersins()
    {
        return $this->belongsTo(User::class, 'fk_sup_id', 'id');
    }

    public function usersup()
    {
        return $this->belongsTo(User::class, 'fk_up_id', 'id');
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class, 'fk_zone_id', 'id');
    }
}
