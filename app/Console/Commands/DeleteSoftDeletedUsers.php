<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DeleteSoftDeletedUsers extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:delete-soft-deleted';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete users that have been soft deleted for more than 90 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dateLimit = now()->subDays(90);
        $usersToDelete = User::onlyTrashed()->where('deleted_at', '<', $dateLimit)->get();

        foreach ($usersToDelete as $user) {
            $user->forceDelete();
        }

        $this->info(count($usersToDelete) . ' users have been deleted.');
    }
}
