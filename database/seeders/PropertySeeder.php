<?php

namespace Database\Seeders;

use App\Models\PropertyCategory;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        $data = [
            [
                "name" => "Apartment",
                "is_active" => 1,
                "is_trending" => 0,
            ],
            [
                "name" => "House",
                "is_active" => 1,
                "is_trending" => 0,
            ],
            [
                "name" => "Office",
                "is_active" => 1,
                "is_trending" => 0,
            ],
            [
                "name" => "Hotel",
                "is_active" => 1,
                "is_trending" => 1,
            ],
            [
                "name" => "Restaurent",
                "is_active" => 1,
                "is_trending" => 1,
            ],
        ];

        foreach ($data as $category) {
            PropertyCategory::updateOrCreate([
                "name" => $category["name"]
            ], $category);
        }
    }
}
