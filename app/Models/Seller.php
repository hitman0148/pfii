<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'picture',
        'address',
        'phone',
        'email_verified_at',
        'status',
        'payment_method',
        'payment_email'
    ];

    protected  $hidden = [
        'password'
    ];
}
