<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Order;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'price',
        'active',
    ];

    /**
     * Get the orders for the package.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
