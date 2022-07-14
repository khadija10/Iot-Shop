<?php

namespace App\Models;
use App\Models\Category;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
class Product extends Model
{


    protected $guarded = [];
    use HasFactory;

    public function orders(): BelongsToMany{
        return $this->belongsToMany(Order::class)
            ->withPivot('total_price', 'total_quantity');
    }


    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function getPrice($price){
        dd($price);
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];



    // public function getFormattedPriceAttribute(): string{
    //     return str_replace('.',',', $this->price / 100) . 'CFA';
    // }
}
