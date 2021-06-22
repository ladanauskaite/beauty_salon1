<?php

namespace App\Models\Model\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class place extends Model
{
    public function services()
    {
        return $this->belongsToMany('App\Models\Model\user\service','place_services');
    }
}
