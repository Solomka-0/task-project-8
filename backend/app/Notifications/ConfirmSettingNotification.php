<?php

namespace App\Notifications;

use App\Models\ConfirmationSetting;
use App\Models\SimpleUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConfirmSettingNotification extends Notification
{
    use Queueable;

    public $confirmation;

    /**
     * Create a new notification instance.
     */
    public function __construct(ConfirmationSetting $confirmation)
    {
        $this->confirmation = $confirmation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(SimpleUser $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Подтверждение изменений')
            ->view('emails/confirm_option', ['notifiable' => $notifiable, 'confirmation' => $this->confirmation]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
