<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','id_type_user','fecha_nacimiento','telefono','cedula','ciudad','apellido','id_usuariocrea','id_usuariomod','ip_usuariomod'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function tipo()
    {
        return $this->belongsTo('App\Type_Users', 'id_type_user');
    }
    public function ciudad()
    {
        return $this->belongsTo('App\Ciudades', 'city');
    }

}
