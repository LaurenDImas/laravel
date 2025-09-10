<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendDailyMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-daily-mail {user?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'perinta untuk mengirim email harian';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \Log::info("Berhasil mengirim email harian");
//        $this->info("berhasil mengirim info");

//        $info = $this->ask("apakah ada info terbaru");
//
//        if($this->confirm("apakah Anda yakit?")){
//            $this->info("berhasil mengirim info: $info ". $this->argument("user"));
//        }else{
//            $this->info("email harian di batalkan");
//        }

    }
}
