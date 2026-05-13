<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::updateOrCreate(
    ['slug' => 'bwindi-gorilla-trek'],
    [
        'name' => 'Bwindi Gorilla Trek',
        'category' => 'Wildlife',
        'description' => 'Encounter gorillas in their natural habitat in the misty Bwindi Impenetrable Forest, a UNESCO World Heritage Site.',
        'image' => 'gorillatrekking.jpg',
        'location' => 'Southwest Uganda',
        'elevation' => '2,600m',
        'best_time' => 'June - Sept',
        'wildlife' => 'Gorillas, Birds',
        'price' => 1000,
        'duration' => '3-5 Days',
        'group_size' => '2-8 Persons',
        'best_season' => 'Year Round',
        'difficulty' => 'Moderate',
        'highlights' => 'Gorilla trekking, Scenic hiking, Birdwatching',
        'featured' => true,
    ]
);

        Destination::updateOrCreate(
            ['slug' => 'murchison-falls-safari'],
            [
                'name' => 'Murchison Falls Safari',
                'category' => 'Featured',
                'slug' => 'murchison-falls-safari',
                'description' => 'Experience the powerful waterfalls and wildlife safari.',
            'image' => 'murchison.jpg',
            'location' => 'Northwest Uganda',
            'elevation' => '615m',
            'best_time' => 'Dec - Feb',
            'wildlife' => 'Elephants, Lions, Giraffes',
            'price' => 800,
            'duration' => '2-4 Days',
            'group_size' => '2-10 Persons',
            'best_season' => 'Dry Season',
            'difficulty' => 'Easy',
            'highlights' => 'Boat cruise, Game drives, Waterfalls',
            'featured' => true,
        ]);

        Destination::updateOrCreate(
            ['slug' => 'lake-bunyonyi-crater-lakes'],
            [
                'name' => 'Lake Bunyonyi Crater Lakes',
                'category' => 'Adventure',
                'slug' => 'lake-bunyonyi-crater-lakes',
                'description' => 'Relax at Uganda’s most scenic crater lake region surrounded by rolling hills and 29 islands. Perfect for relaxation, canoeing, and cultural experiences.',
                'image' => 'craterlakes.jpg',
                'location' => 'Southwestern Uganda',
                'elevation' => '1,962m',
                'best_time' => 'June - September & December - February',
                'wildlife' => 'Birds, Small wildlife, Fish species',
                'price' => 600,
                'duration' => '2-3 Days',
                'group_size' => '2-6 Persons',
                'best_season' => 'Year Round',
                'difficulty' => 'Easy',
                'highlights' => 'Canoeing, Island hopping, Cultural visits, Scenic views',
                'featured' => true,
            ]);

        Destination::updateOrCreate(
            ['slug' => 'queen-elizabeth-national-park-safari'],
            [
                'name' => 'Queen Elizabeth National Park Safari',
                'category' => 'Wildlife',
                'slug' => 'queen-elizabeth-national-park-safari',
                'description' => 'Explore Uganda’s most diverse savannah park with tree-climbing lions, elephants, and the famous Kazinga Channel boat cruise.',
                'image' => 'queeneli.jpg',
                'location' => 'Western Uganda',
                'elevation' => '910m',
                'best_time' => 'June - September & December - February',
                'wildlife' => 'Lions, Elephants, Hippos, Buffaloes',
                'price' => 900,
                'duration' => '3-4 Days',
                'group_size' => '2-10 Persons',
                'best_season' => 'Dry Season',
                'difficulty' => 'Easy',
                'highlights' => 'Game drives, Kazinga Channel cruise, Tree-climbing lions',
                'featured' => true,
            ]);


Destination::updateOrCreate([
    'slug' => 'source-of-the-nile-adventure'
], [
    'name' => 'Source of the Nile Adventure',
    'category' => 'Featured',
    'slug' => 'source-of-the-nile-adventure',
    'description' => 'Visit the legendary source of the River Nile and enjoy white-water rafting, kayaking, and adrenaline activities in Jinja.',
    'image' => 'explore-uganda.jpg',
    'location' => 'Jinja, Eastern Uganda',
    'elevation' => '1,134m',
    'best_time' => 'Year Round',
    'wildlife' => 'Birds, Aquatic life',
    'price' => 700,
    'duration' => '1-3 Days',
    'group_size' => '1-8 Persons',
    'best_season' => 'All Seasons',
    'difficulty' => 'Moderate to Hard',
    'highlights' => 'White-water rafting, Nile boat ride, bungee jumping',
    'featured' => true,
]);

Destination::updateOrCreate([
    'slug' => 'rwenzori-mountains-hiking-experience'
], [
    'name' => 'Rwenzori Mountains Hiking Experience',
    'category' => 'Adventure',
    'slug' => 'rwenzori-mountains-hiking-experience',
    'description' => 'Trek the legendary Mountains of the Moon with glaciers, alpine vegetation, and breathtaking summit views.',
    'image' => 'mountainpeaks.jpg',
    'location' => 'Western Uganda (Kasese)',
    'elevation' => '5,109m',
    'best_time' => 'June - August & December - February',
    'wildlife' => 'Colobus monkeys, Birds, Unique alpine flora',
    'price' => 1200,
    'duration' => '5-8 Days',
    'group_size' => '2-6 Persons',
    'best_season' => 'Dry Season',
    'difficulty' => 'Hard',
    'highlights' => 'Glacier trekking, high-altitude hiking, scenic peaks',
    'featured' => true,
]);

        

        $this->call(DestinationSeeder::class);
    }
}
