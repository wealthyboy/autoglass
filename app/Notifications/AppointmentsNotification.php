<?php 
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentsNotification extends Notification
{
    use Queueable;

    public $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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
        return (new MailMessage)
                    ->bcc('info@autoglass.ng')
                    ->greeting('Dear ' . $this->data['first_name'] . ' ' . $this->data['last_name'] . ',')
                    ->line('Thank you for choosing AutoglassNg for your auto glass replacement and repair services.')
                    ->line('We have successfully received your submission and will begin processing your request immediately.')
                    ->line('One of our customer service representatives will be in touch shortly to confirm your details and schedule an appointment at your convenience.')
                    ->line('We look forward to providing you with excellent service.')
                    ->salutation('Best regards, AutoglassNg');
    }
}
