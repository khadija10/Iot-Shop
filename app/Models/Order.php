<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\belongsTo;
use App\Models\User;
use App\Models\Delivery;
use App\Models\Payment;




class Order extends Model
{
    protected $guarded = [];

    use HasFactory;



    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
