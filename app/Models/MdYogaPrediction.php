<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MdYogaPrediction extends Model
{
     protected $table = 'md_yoga_predictionas';
     protected $fillable = [
        'combination',
        'description'
    ];
}
