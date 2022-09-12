<?php

namespace App\Notifications\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailResetPassword extends Notification
{
    use Queueable;

    private $user;
    private $token;

    public function __construct($user, $token)
    {
        $this->user  = $user;
        $this->token = $token;
    }

    public function via()
    {
        return ['mail'];
    }

    public function toMail()
    {
        $mailMessage = new MailMessage();

        $mailMessage->subject('Notificação de recuperação de senha');
        $mailMessage->greeting('Olá ' . $this->user->name);
        $mailMessage->line('Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha para sua conta.');
        $mailMessage->action('Recuperar senha', 'http://localhost:3000/resetar-senha/'.$this->token);
        $mailMessage->line('<span class="notice">Se você não solicitou uma redefinição de senha, nenhuma outra ação será necessária.</span>');

        return $mailMessage;
    }
}
