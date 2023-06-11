<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hall;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $halls = [
            [
                'hotel_id' => 1,
                'type' => 'Luxury Suite',
                'description' => '2000 sqft, 3 king sized beds, full kitchen.',
                'price' => 980.00,
            ],
            [
                'hotel_id' => 1,
                'type' => 'Double',
                'description' => 'Two queen beds.',
                'price' => 200.00,
            ],
            [
                'hotel_id' => 2,
                'type' => 'Suite',
                'description' => 'International luxurious room.',
                'price' => 350.00,

            ],
            [
                'hotel_id' => 2,
                'type' => 'Economy',
                'description' => 'One queen bed, mini fridge.',
                'price' => 87.99,

            ],
            [
                'hotel_id' => 3,
                'type' => 'Suite',
                'description' => 'One ultra wide king bed, full kitchen.',
                'price' => 399.00,

            ]
        ];

        foreach ($halls as $hall) {
            Hall::create(array(
                'hotel_id' => $hall['hotel_id'],
                'type' => $hall['type'],
                'description' => $hall['description'],
                'price' => $hall['price'],

            ));
        }
    }
}
