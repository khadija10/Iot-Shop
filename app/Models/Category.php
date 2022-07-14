<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Category extends Model
{
    protected $guarded = [];
    use HasFactory;


    public function products(){
        return $this->belongsToMany(Products::class);
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
