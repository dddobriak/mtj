<?php
namespace Pavel\MessagesToJson;

use Illuminate\Support\ServiceProvider;
use Pavel\MessagesToJson\Commands\MessagesCommand;
use Pavel\MessagesToJson\Commands\UsersCommand;

class MessagesToJsonServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/config/messages-to-json.php', 'messages-to-json');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->commands([MessagesCommand::class, UsersCommand::class]);
    }
}