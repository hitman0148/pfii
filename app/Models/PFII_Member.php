<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PFII_Member extends Model
{
    use HasFactory;
    protected $table = 'pfii_members';
    protected $fillable = [
        'id_no',
        'fname',
        'lname',
        'mi',
        'bday',
        'gender',
        'civil_stat',
        'address',
        'mobile_no',
        'date_expiration',
        'is_active'
    ];

    public $timestamps = false;
}
