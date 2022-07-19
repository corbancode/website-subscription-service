<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;

class PostNotification extends Notification implements ShouldQueue
{
    use Queueable, InteractsWithQueue;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\Post $post
     *
     * @return void
     */
    public function __construct(protected Post $post)
    {
        //
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
                    ->subject($this->post->title)
                    ->greeting("Hello {$notifiable->name}")
                    ->line("A new post has been created for website: {$this->post->website->name}.")
                    ->line("Title: {$this->post->title}")
                    ->line($this->post->description)
                    ->line('Thank you for using our application!');
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
