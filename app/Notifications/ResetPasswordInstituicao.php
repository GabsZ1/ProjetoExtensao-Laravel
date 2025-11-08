<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordInstituicao extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Recuperar senha da instituição')
            ->line('Você solicitou a redefinição de senha.')
            ->action('Redefinir senha', url('/instituicao/password/reset/'.$this->token.'?email='.$notifiable->email))
            ->line('Se não foi você, ignore este email.');
    }
}
