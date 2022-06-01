<?php

namespace App\Console\Commands;

use App\Models\Integration;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;

class UpdateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:update {marketplace} {username} {password} {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $user_id = $this->argument('id');

        if ($marketplace == "trendyol" || $marketplace == "n11")
        {
            Integration::find($user_id)->update([
                'marketplace' => $marketplace,
                'username' => $username,
                'password' => $password,
            ]);
        }


    }
}
