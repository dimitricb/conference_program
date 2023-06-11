<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $hotels = [
            [
                'name' => 'Marriott',
                'location' => 'Seattle, WA',
                'description' => 'International luxurious hotel.',

            ],
            [
                'name' => 'Aria',
                'location' => 'Las Vegas, NV',
                'description' => 'International luxurious hotel.',

            ],
            [
                'name' => 'MGM Grand',
                'location' => 'Las Vegas, NV',
                'description' => 'International luxurious hotel.',

            ]
        ];

        foreach ($hotels as $hotel) {
            Hotel::create(array(
                'name' => $hotel['name'],
                'location' => $hotel['location'],
                'description' => $hotel['description'],

            ));
        }
    }
}
