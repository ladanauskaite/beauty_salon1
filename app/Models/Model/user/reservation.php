<?php

namespace App\Models\Model\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    
    public function services()
    {
        return $this->belongsToMany('App\Models\Model\user\reservation','service_reservation', 'reservation_id','service_id' )->withTimestamps(); 
    }
    
    public function admins()
    {
        return $this->belongsToMany('App\Models\Model\user\reservation','admin_reservation', 'reservation_id', 'admin_id')->withTimestamps(); 
    }
}
