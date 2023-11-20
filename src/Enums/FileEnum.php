<?php

namespace Pavel\MessagesToJson\Enums;
 
enum FileEnum: string
{
    case Messages = 'messages';
    case Users = 'users';
    case Ext = '.json';
}
