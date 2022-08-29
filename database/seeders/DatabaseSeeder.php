<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Bominsoe',
             'email' => 'bominsoe@example.com',
             'password' => Hash::make('bominsoe777')
         ]);

        $categories = ["IT New","Sport","Foot & Drinks","Travel"];

        foreach ($categories as $category){
            Category::factory()->create([
                'title' => $category,
                'slug' => \Illuminate\Support\Str::slug($category),
                'user_id' => User::inRandomOrder()->first()->id
            ]);
        }
        Post::factory(250)->create();
    }
}
