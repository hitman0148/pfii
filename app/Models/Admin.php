<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

//class Admin extends Model
class Admin extends Authenticatable
{
    use HasFactory;

    protected $guard = 'admin';
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'picture'
    ];

    protected $hidden = [
        'password'
    ];

}
