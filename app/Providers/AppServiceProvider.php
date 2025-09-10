<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Route::bind('post', function ($value) {
            return Post::where('slug', $value)->orWhere('uuid', $value)->firstOrFail();
        });

//        \RateLimiter::for('global', function (Request $request) {
//            return Limit::perMinute(5)->by($request->ip());
//        });
    }
}
