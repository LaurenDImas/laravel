<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::transaction(function () {
            $users = \App\Models\User::factory()->count(100)->create();

            $users->each(function ($user) {
                Post::factory()->count(10)->for($user)->create();
            });
        });
    }
}
