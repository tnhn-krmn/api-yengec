<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Integration;

class DeleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:user {id}';

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
        $id = $this->argument('id');
        $integration = Integration::find($id);
        $integration->delete();
    }
}
