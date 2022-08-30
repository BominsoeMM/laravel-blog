<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Bominsoe',
            'email' => 'bominsoe@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('bominsoe777')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Editor',
            'email' => 'editor@example.com',
            'role' => 'editor',
            'password' => Hash::make('bominsoe777')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Author',
            'email' => 'author@example.com',
            'role' => 'author',
            'password' => Hash::make('bominsoe777')
        ]);

    }
}
