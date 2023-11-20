<?php

namespace Pavel\MessagesToJson\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Pavel\MessagesToJson\Services\MessageService;

class MessagesCommand extends Command
{
    public $signature = 'mtj:messages';

    public $description = 'Getting user messages';

    public function handle(MessageService $messageService): int
    {
        $choise = $this->choice(
            'Select messages by?',
            ['UserId', 'Email'],
            0
        );

        $ask = $this->ask('Enter the ' . $choise);

        $this->info('You have requested data for user ID: ' . $ask);

        $link = $messageService->saveMessagesToJson($ask);

        $this->comment('Take it here: ' . $link);

        return self::SUCCESS;
    }
}