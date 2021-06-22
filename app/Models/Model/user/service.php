<?php

namespace App\Models\Model\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    public function places()
    {
        return $this->belongsToMany('App\Models\Model\user\service','place_services', 'service_id', 'place_id')->withTimestamps(); 
    }
    
    public function reservations()
    {
        return $this->belongsToMany('App\Models\Model\user\reservation','service_reservation');
    }
    
    public function getRouteKeyName()
    {
        return 'slug'; 
    }
}
 