<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PFIIMonthlyDue extends Model
{
    use HasFactory;

    protected $table ='monthlydue';
    public $timestamps = false;
    protected $fillable = [
        'mid','member_id','amt','date_created','created_by'
    ];
}
