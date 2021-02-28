<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'date_of_rent',
        'date_of_return'
    ];


    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');

    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

}
