<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User as User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => env('SEED_NAME'),
            'username' => env('SEED_LOGIN'),
            'email' => env('SEED_EMAIL')
        ]);

        Post::factory(30)->create([
            'user_id' => $user->id
        ]);

        Category::factory(20)->create();
    }
}
