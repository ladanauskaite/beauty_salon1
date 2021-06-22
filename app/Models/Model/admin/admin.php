<?php

namespace App\Models\Model\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class admin extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    
    public function roles()
    {
        return $this->belongsToMany('App\Models\Model\admin\role');
    }
    
    public function reservations()
    {
        return $this->belongsToMany('App\Models\Model\user\reservation','admin_reservation');
    }

    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
