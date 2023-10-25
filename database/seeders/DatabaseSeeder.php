<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'department' => 'Informatics',
        ]);

        Post::create([
            'user_id' => 1,
            'text' => 'first post',
            'slug' => 'first-post',
        ]);

        Comment::create([
            'user_id' => 1,
            'post_id' => 1,
            'text' => 'first comment dapet apa bang',
        ]);
    }
}
