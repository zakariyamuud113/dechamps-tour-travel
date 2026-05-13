<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = [
    'destination_id',

    'preferred_date',
    'travelers',
    'duration',

    'full_name',
    'email',
    'phone',
    'country',

    'age_group',
    'accommodation',
    'dietary_requirements',
    'special_requests',

    // 'travel_insurance',

    'subtotal',
    'total_amount',

    'status',
];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
