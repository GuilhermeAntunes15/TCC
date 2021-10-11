<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['CD_USUARIO', 'US_NOME', 'US_LOGIN', 'US_EMAIL', 'US_DT_NASCIMENTO', 'US_FL_PROFESSOR_SN'];
    protected $username = 'US_LOGIN';
    protected $hidden = ['US_SENHA', 'remember_token'];
    protected $primaryKey = 'CD_USUARIO';
    protected $table = "VW_USUARIO";

    public function getAuthPassword()
    {
        return $this->US_SENHA;
    }
}
