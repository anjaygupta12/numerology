<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PdYogaPrediction extends Model
{
     protected $table = 'pd_yoga_predictionas';
     protected $fillable = [
        'combination',
        'type',
        'description'
    ];
}
