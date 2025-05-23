<?php

namespace App\Models;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Admin extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $table = 'admin';
    protected $fillable = [
        'username_admin',
        'pw_admin',
        'fullname_admin',
        'pertanyaan',
        'jawaban',
    ];
    public function getAuthIdentifierName()
    {
        return 'username_admin';
    }
    public function getAuthIdentifier()
    {
        return $this->username_admin;
    }
    public function getAuthPassword()
    {
        return $this->pw_admin;
    }
}
