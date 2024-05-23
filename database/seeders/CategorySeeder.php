<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cats = [
            [
                'name' => 'Beverages',
                'description' => 'Any drinkable product except milk and liqour'
            ],
            [
                'name' => 'Fruits & Vegetables',
                'description' => 'Plant-based products'
            ],
            [
                'name' => 'Groceries',
                'description' => 'All grocery products'
            ],
            [
                'name' => 'Wines & Spirits',
                'description' => 'Any liqour-based products'
            ],
            [
                'name' => 'Medicines',
                'description' => 'Any medicinal products without prescription requirements'
            ]
        ];

        foreach($cats as $c) Category::create($c);
    }
}
