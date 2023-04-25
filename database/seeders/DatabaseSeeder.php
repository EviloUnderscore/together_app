<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder,
    App\Models\Category,
    App\Models\Activity,
    Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->SeedCategories();
        $this->SeedActivities();
    }

    private function SeedCategories(){
        

        // Seed data for the categories table
        $categories = [
            ['name' => 'Randonnée', 'image' => 'img-rando.jpg'],
            ['name' => 'Jogging', 'image' => 'img-jogging.jpg'],
            ['name' => 'Tennis', 'image' => 'img-tennis.jpg'],
            ['name' => 'Ski nautique', 'image' => 'img-skinautique.jpg'],
            ['name' => 'Acrobranche', 'image' => 'img-acrobranche.jpg'],
            ['name' => 'Vélo', 'image' => 'img-velo.jpg'],
            ['name' => 'Moto', 'image' => 'img-moto.jpg'],
            // Add more categories as needed
        ];

        // Insert seed data into the categories table
        Category::insert($categories);
    }

    private function SeedActivities(){
        
        // Create sample activities data
        $activities = [
            [
                'name' => 'Randonnée charmante à Ougrée-Bas',
                'description' => 'Une petite rando pour explorer les récents travaux et les nouveaux tags du bas de Seraing',
                'location' => '4102, Ougrée',
                'lat' => '50.14141',
                'long' => '5.03345',
                'date' => Carbon::create(2023, 5, 17, 14, 30, 0),
                'image' => 'image-activity-1.jpg',
                'category_id' => 1
            ],
            [
                'name' => 'Risus Ornare Mollis Dolor',
                'description' => 'Vestibulum id ligula porta felis euismod semper. Nulla vitae elit libero, a pharetra augue.',
                'location' => 'Purus Nibh',
                'date' => Carbon::create(2023, 5, 18, 14, 30, 0),
                'lat' => '50.14141',
                'long' => '5.03345',
                'image' => '4684, Haccourt',
                'category_id' => 2
            ],
            [
                'name' => 'Risus Ornare Mollis Dolor',
                'description' => 'Vestibulum id ligula porta felis euismod semper. Nulla vitae elit libero, a pharetra augue.',
                'location' => '4684, Haccourt',
                'date' => Carbon::create(2023, 5, 22, 14, 30, 0),
                'lat' => '50.14141',
                'long' => '5.03345',
                'image' => '4000, Liège',
                'category_id' => 3
            ],
            [
                'name' => 'Risus Ornare Mollis Dolor',
                'description' => 'Vestibulum id ligula porta felis euismod semper. Nulla vitae elit libero, a pharetra augue.',
                'location' => '4050, Chaufontaine',
                'date' => Carbon::create(2023, 5, 28, 14, 30, 0),
                'lat' => '50.14141',
                'long' => '5.03345',
                'image' => '4140, Sprimont',
                'category_id' => 2
            ],
            [
                'name' => 'Risus Ornare Mollis Dolor',
                'description' => 'Vestibulum id ligula porta felis euismod semper. Nulla vitae elit libero, a pharetra augue.',
                'location' => '4050, Chaufontaine',
                'date' => Carbon::create(2023, 6, 5, 14, 30, 0),
                'lat' => '50.14141',
                'long' => '5.03345',
                'image' => '4430, Ans',
                'category_id' => 3
            ],
            [
                'name' => 'Risus Ornare Mollis Dolor',
                'description' => 'Vestibulum id ligula porta felis euismod semper. Nulla vitae elit libero, a pharetra augue.',
                'location' => '4050, Chaufontaine',
                'date' => Carbon::create(2023, 6, 7, 14, 30, 0),
                'lat' => '50.14141',
                'long' => '5.03345',
                'image' => 'image-activity-2.jpg',
                'category_id' => 1
            ],
            [
                'name' => 'Risus Ornare Mollis Dolor',
                'description' => 'Vestibulum id ligula porta felis euismod semper. Nulla vitae elit libero, a pharetra augue.',
                'location' => 'Purus Nibh',
                'date' => Carbon::create(2023, 6, 9, 14, 30, 0),
                'lat' => '50.14141',
                'long' => '5.03345',
                'image' => '4100, Boncelles',
                'category_id' => 1
            ],
            [
                'name' => 'Risus Ornare Mollis Dolor',
                'description' => 'Vestibulum id ligula porta felis euismod semper. Nulla vitae elit libero, a pharetra augue.',
                'location' => '4170, Comblain-au-pont',
                'date' => Carbon::create(2023, 6, 12, 14, 30, 0),
                'lat' => '50.14141',
                'long' => '5.03345',
                'image' => 'image-activity-1.jpg',
                'category_id' => 2
            ],
            [
                'name' => 'Risus Ornare Mollis Dolor',
                'description' => 'Vestibulum id ligula porta felis euismod semper. Nulla vitae elit libero, a pharetra augue.',
                'location' => '4210, Vissoul',
                'date' => Carbon::create(2023, 6, 15, 14, 30, 0),
                'lat' => '50.14141',
                'long' => '5.03345',
                'image' => 'image-activity-2.jpg',
                'category_id' => 3
            ],
            [
                'name' => 'Risus Ornare Mollis Dolor',
                'description' => 'Vestibulum id ligula porta felis euismod semper. Nulla vitae elit libero, a pharetra augue.',
                'location' => '4257, Berloz',
                'date' => Carbon::create(2023, 6, 21, 14, 30, 0),
                'lat' => '50.14141',
                'long' => '5.03345',
                'image' => 'image-activity-3.jpg',
                'category_id' => 2
            ],
        ];

        // Insert seed data into the activities table
        Activity::insert($activities);
    }
}
