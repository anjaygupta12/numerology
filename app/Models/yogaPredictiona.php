<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class yogaPredictiona extends Model
{
    protected $table = 'yoga_predictionas';
     protected $fillable = [
        'combination',
        'description'
    ];

}
