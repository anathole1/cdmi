<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['up_date','appoint_date','status'];

    public function client(){
        return $this->hasOne(Client::class,'id', 'client_id');
    }
}
