<?php

namespace Pavel\MessagesToJson\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UsersCommand extends Command
{
    public $signature = 'mtj:users';

    public $description = 'Getting user data';

    public function handle(): int
    {
        $users = config('messages-to-json.user');

        $this->table(['id', 'name', 'email'], $users::all(['id', 'name', 'email'])->toArray());

        $this->comment('That\'s all');

        return self::SUCCESS;
    }
}