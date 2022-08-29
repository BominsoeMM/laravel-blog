<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["IT New","Sport","Foot & Drinks","Travel"];

        foreach ($categories as $category){
            Category::factory()->create([
                'title' => $category,
                'slug' => \Illuminate\Support\Str::slug($category),
                'user_id' => User::inRandomOrder()->first()->id
            ]);
        }
    }
}
