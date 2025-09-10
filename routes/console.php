<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('app:send-daily-mail')->before(function (){
    \Log::info("Daily mail akan dikirim");
})->after(function (){
    \Log::info("Daily mail selesai dikirim");
})->everyMinute();
