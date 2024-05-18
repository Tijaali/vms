<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class FormSubmittedNotification extends Notification
{
    use Queueable;

    public $formData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'message' => 'A new form has been submitted.',
            'formData' => $this->formData,
        ];
    }

    /**
     * Get the custom database notification array.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'message' => 'A new form has been submitted.',
            'formData' => $this->formData,
        ];
    }

    /**
     * Save the notification to a custom table.
     *
     * @param  mixed  $notifiable
     * @return void
     */
    public function saveToDatabase($notifiable)
    {
        DB::table('name_notifications')->insert([
            'id' => $this->id,
            'type' => get_class($this),
            'notifiable_type' => get_class($notifiable),
            'notifiable_id' => $notifiable->id,
            'data' => json_encode($this->toDatabase($notifiable)),
            'read_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
