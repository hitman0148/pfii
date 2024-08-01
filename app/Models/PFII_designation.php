<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PFII_designation extends Model
{

    protected $table = 'pfii_designations';
    use HasFactory;

    protected $fillable = [
        'designation',
        'is_active',
        'date_created',
        'created_by'
    ];

    public $timestamps = false;
}
