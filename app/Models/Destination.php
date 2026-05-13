<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'name',
        'category',
        'slug',
        'description',
        'image',
        'location',
        'elevation',
        'best_time',
        'wildlife',
        'price',
        'duration',
        'group_size',
        'best_season',
        'difficulty',
        'highlights',
        'featured',
    ];

    public function bookings()
        {
            return $this->hasMany(Booking::class);
        }
}
