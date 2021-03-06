<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    public function products(): BelongsToMany{
        return $this->belongsToMany(Product::class)
            ->withPivot('total_price', 'total_quantity');
    }
}
