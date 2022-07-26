<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Delivery;

class Payment extends Model
{
    protected $guarded = [];

    use HasFactory;


    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }
}
