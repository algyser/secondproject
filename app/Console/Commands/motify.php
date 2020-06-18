<?php

namespace App\Console\Commands;
use \App\User;
use \App\Mail\Motifyem;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class motify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'motifyemails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $emails = User::pluck('email')->toArray();
        $data = ['title' => 'programming' , 'body' => 'php'];
        foreach ($emails as $email) {
           Mail::To($email)->send(new motifyem($data));
        }
    }
}
