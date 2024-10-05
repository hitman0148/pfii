<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MD_Months extends Model
{
    use HasFactory;

    protected $table = 'md_months';
    public $timestamps = false;
    protected $fillable = [
        'month','year','date_created','created_by','is_deleted'
    ];

}
