<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testing', function () {
//    $posts = Post::all();
    $posts = Post::with('user')->get();
    foreach ($posts as $post) {
        echo $post->user->name;
    }
});

Route::get('/morph_one_to_one', function () {
    $company = \App\Models\Company::create(['name' => 'Test Company']);
    $company->address()->create([
        'street_name' => 'Jl. Sudirman',
        'city_name' => 'Jakarta',
    ]);
    dd($company->address);
//    User
    $user = \App\Models\User::first();
    dd($user->address);
    $user->address()->create([
       'street_name' => 'Jl. Sudirman',
       'city_name' => 'Jakarta',
    ]);

    dd($user);
});

Route::get('/morph_one_to_many', function () {
    $user = \App\Models\User::first();
    $user->addresses()->createMany([
        [
            'street_name' => 'Jl. Sudirman',
            'city_name'   => 'Jakarta',
        ],
        [
            'street_name' => 'Jl. Gatot Subroto',
            'city_name'   => 'Bandung',
        ],
    ]);

    dd($user, $user->addresses);
});

Route::get('/morph_many_to_many', function () {
//    $post = Post::first();
//
//    $tags = \App\Models\Tag::all();
//
//    $post->tags()->attach($tags);

//    $tag = \App\Models\Tag::where('name', 'Opini')->first();
//
//    $posts = Post::whereIn('uuid',[
//        "3b869f9d-8adb-33c6-b4d2-7ee50d3f4348",
//        "3a5da72b-b281-395c-8e34-f3a664ea8475"
//    ])->get();
//
//    $tag->posts()->attach($posts);

//    $video = \App\Models\Video::create([
//        'title' => 'Test Video',
//        'path' => '/videos/test-video.mp4',
//    ]);
//
//    $tags = \App\Models\Tag::all();
//
//    $video->tags()->attach($tags);

    $tag = \App\Models\Tag::where('name', 'Opini')->first();
    $tag->posts()->detach();
    $tag->videos()->detach();
    dd($tag->posts, $tag->videos);

});


Route::get('/documentation', function () {
    return view('documentation');
});

//Route::get('/post/{post}', [\App\Http\Controllers\HomeController::class, 'showPost'])->middleware('throttle:global');
Route::get('/post/{post}', [\App\Http\Controllers\HomeController::class, 'showPost'])->middleware('throttle:10,1');
