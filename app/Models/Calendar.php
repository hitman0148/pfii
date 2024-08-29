<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','description','start','end','className','icon','allDay','date_created','created_by','is_active'
    ];

    public $timestamps = false;
}
