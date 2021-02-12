<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation', 'reservation_id');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification', 'notification_id');
    }
    
}
