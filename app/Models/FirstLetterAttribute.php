<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstLetterAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter',
        'description'
    ];

    protected $casts = [
        'letter' => 'string'
    ];
} 