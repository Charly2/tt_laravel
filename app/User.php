<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password','rol'
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


    public function hasRole($role,$roles){

        if ($this->rol == $role){
            return true;
        }
        foreach ($roles as $rr){
            if ($this->rol == $rr){
                return true;
            }
        }
        return false;
    }


    public function getTitleOfRole(){
        switch ($this->rol){
            case 'cocendi':
                return "Administrador de COCENDI";
                break;
            case 'trabajador':
                return "Trabajador del IPN";
                break;
        }
    }


}
