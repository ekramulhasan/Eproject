<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [

            'Honey',
            'Natural oil',
            'Butter',
            'Nuts',
            'Coconut'
        ];


        foreach ($categories as $value) {

            category::create([

                'title' => $value,
                'slug' =>Str::slug($value)

            ]);
        }


    }
}
