<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','active','activation_key','key_pw',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','key_pw',
    ];




    public function jumlahDataUjian(){
        return $this->hasMany('App\Model\UjianModel','id_user','id');
    }

    public function getPengujiJaringan(){
        return $this->hasOne('App\Model\PengujiModel','id_penguji','id_penguji_jaringan');
    }
    public function getPengujiRPL(){
        return $this->hasOne('App\Model\PengujiModel','id_penguji','id_penguji_rpl');
    }
    public function getPengujiAgama(){
        return $this->hasOne('App\Model\PengujiModel','id_penguji','id_penguji_agama');
    }
}
