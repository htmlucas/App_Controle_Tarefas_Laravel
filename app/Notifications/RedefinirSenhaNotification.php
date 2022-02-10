<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class RedefinirSenhaNotification extends Notification
{
    use Queueable;
    public $token;
    public $email;
    public $name;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token,$email,$name)
    {
        $this->token = $token;
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $minutos = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
        $url = 'http://localhost:8000/password/reset/'.$this->token.'?email='.$this->email;
        $saudacao = "Olá $this->name";
        return (new MailMessage)
            ->subject('ATUALIZAÇÃO DE SENHA')
            ->greeting($saudacao)
            ->line('Esqueceu a senha? sem problemas vamos resolver isso')
            ->action('Clique aqui para modificar a sua senha', $url)
            ->line("O link acima expira em $minutos minutos")
            ->line('Caso voce nao tenha requisitado a alteração de senha, então desconsidere a mensagem!')
            ->salutation('Até Breve');

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
