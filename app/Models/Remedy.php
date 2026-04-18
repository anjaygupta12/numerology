<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remedy extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'bn',
        'dn', 
        'nn',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'number' => 'integer'
    ];
}
