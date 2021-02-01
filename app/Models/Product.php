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
        return $this->belongsTo('App\Categories', 'category_id');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservations', 'reservation_id');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notifications', 'notification_id');
    }
    
}
