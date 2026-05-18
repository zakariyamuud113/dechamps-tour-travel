<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'story_title',
        'story_content',
        'story_image',
        'mission',
        'vision',
        'years_experience',
        'happy_travelers',
        'destinations_count',
        'tour_guides'
    ];
}

