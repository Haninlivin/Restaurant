<?php

namespace App\Models;

use App\Models\Dish;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}
