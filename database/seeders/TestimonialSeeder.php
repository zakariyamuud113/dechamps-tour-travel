<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
        'name' => 'Jane D.',
        'image' => 'testimonial1.jpg',
        'message' => 'Dechamps Tours made our trip to Uganda unforgettable! Highly recommend their services.',
    ]);

    Testimonial::create([
        'name' => 'John D.',
        'image' => 'testimonial-2.jpg',
        'message' => 'The guides were knowledgeable and friendly. Highly recommend Dechamps Tours!',
    ]);

    Testimonial::create([
        'name' => 'Emily R.',
        'image' => 'testimonial-3.jpg',
        'message' => 'A seamless and unforgettable experience. Dechamps Tours exceeded our expectations!',
    ]);

    Testimonial::create([
        'name' => 'Michael S.',
        'image' => 'testimonial-4.jpg',
        'message' => 'Dechamps Tours provided exceptional service and unforgettable experiences. Highly recommend!',
    ]);
    }
}
