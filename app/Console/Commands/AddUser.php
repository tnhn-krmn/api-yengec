<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Integration;

class AddUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:user {marketplace} {username} {password} {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User create ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $marketplace = $this->argument('marketplace');
        $username = $this->argument('username');
        $password = $this->argument('password');
        $user_id = $this->argument('user_id');


        $integration = new Integration();
        $integration->marketplace = $marketplace;
        $integration->username = $username;
        $integration->password = $password;
        $integration->user_id = $user_id;
        $integration->save();


    }
}
