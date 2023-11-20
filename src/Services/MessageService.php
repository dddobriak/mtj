<?php

namespace Pavel\MessagesToJson\Services;

use Illuminate\Support\Facades\Storage;
use Pavel\MessagesToJson\Enums\FileEnum;

class MessageService
{
    public function saveMessagesToJson($userId): string
    {
        $user = config('messages-to-json.user');

        $messages = $user::findOrFail($userId)->messages;

        $file = $userId . '-' . FileEnum::Messages->value . FileEnum::Ext->value;

        Storage::disk(config('messages-to-json.disk'))
            ->put(
                config('messages-to-json.path') . '/' . $file, $messages->toJson()
            );

        return asset('storage/' . config('messages-to-json.path') . '/' .  $file);
    }
}