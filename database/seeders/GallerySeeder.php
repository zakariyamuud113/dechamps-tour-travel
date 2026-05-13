<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gallery;


class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::UpdateOrCreate([
        'title' => 'Gorillas in Bwindi',
        'description' => 'Experience the majestic gorillas in their natural habitat.',
        'image' => 'gorillatrekking.jpg',
        'category' => 'Wildlife',
    ]);

    Gallery::create([
        'title' => 'Murchison Falls View',
        'description' => 'Enjoy the breathtaking view of Murchison Falls.',
        'image' => 'murchison.jpg',
        'category' => 'Landscapes',
    ]);

    Gallery::create([
        'title' => 'Traditional Dance',
        'description' => 'Witness the vibrant traditional dances.',
        'image' => 'culture.jpg',
        'category' => 'Culture',
    ]);

    Gallery::create([
        'title' => 'Lake Bunyonyi Canoe',
        'description' => 'Enjoy a scenic canoe ride on Lake Bunyonyi.',
        'image' => 'craterlakes.jpg',
        'category' => 'Landscapes',
    ]);

    Gallery::create([
        'title' => 'Chimpanzee Trekking',
        'description' => 'Get up close with chimpanzees in their natural habitat.',
        'image' => 'gallery5.jpg',
        'category' => 'Wildlife',
    ]);

    Gallery::create([
        'title' => 'Local Market',
        'description' => 'Experience the vibrant local markets and culture.',
        'image' => 'cultural.jpg',
        'category' => 'Culture',
    ]);

    Gallery::create([
        'title' => 'Sunset Safari',
        'description' => 'Enjoy a stunning sunset safari experience.',
        'image' => 'safari.jpg',
        'category' => 'Landscapes',
    ]);

     Gallery::create([
        'title' => 'Bird Watching',
        'description' => 'Discover the diverse bird species in Uganda.',
        'image' => 'birdwatching.jpg',
        'category' => 'Wildlife',
    ]);
    }
}
