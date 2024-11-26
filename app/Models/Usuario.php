<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'id',
        'nome',
        'email',
        'username',
        'password',
        'admin'
    ];

    function getAuthIdentifierName() {
        return 'id';
    }
    function getAuthIdentifier() {
        return $this->id;
    }
    function getAuthPassword() {
        return $this->password;
    }
    function getAuthPasswordName() {
        return 'password';
    }
    function getRememberToken() {
        
    }
    function setRememberToken($value) {

    }
    function getRememberTokenName() {
        
    }
}
