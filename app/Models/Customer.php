<?php

namespace App\Models;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Customer extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $table = 'customer';
    protected $fillable = [
        'username_cus',
        'pw_cus',
        'fullname_cus',
        'pertanyaan',
        'jawaban',
    ];
    public function getAuthIdentifierName()
    {
        return 'username_cus';
    }
    public function getAuthIdentifier()
    {
        return $this->username_cus;
    }
    public function getAuthPassword()
    {
        return $this->pw_cus;
    }
}
