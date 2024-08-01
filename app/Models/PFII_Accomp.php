<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PFII_Accomp extends Model
{

    protected $table = 'pfii_accomps';
    use HasFactory;

    protected $fillable = [
        'activity_date',
        'site',
        'activity',
        'remarks',
        'personels',
        'date_created',
        'created_by',
        'is_active'
    ];

    public $timestamps = false;
}
