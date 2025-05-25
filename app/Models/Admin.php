<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin';
    protected $guarded = ['id'];

    protected $fillable = [
        'username_admin',
        'pw_admin',
        'fullname_admin',
        'pertanyaan',
        'jawaban',
    ];

    protected $hidden = [
        'pw_admin',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->pw_admin;
    }

    public function getAuthIdentifierName()
    {
        return 'username_admin';
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
