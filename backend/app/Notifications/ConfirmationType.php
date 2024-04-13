<?php

namespace App\Notifications;

enum ConfirmationType
{
    case MAIL;
    case SMS;
    case TELEGRAM;

    public function value(): string
    {
        return match ($this) {
            self::MAIL => 'mail',
            self::SMS => 'sms',
            self::TELEGRAM => 'telegram',
        };
    }
}
