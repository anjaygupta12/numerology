<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdYogaPrediction extends Model
{
    protected $table = 'ad_yoga_predictionas';
     protected $fillable = [
        'combination',
        'type',
        'description'
    ];
}
