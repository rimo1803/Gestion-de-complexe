<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Attestation;

class NouvelleDemandeAttestation extends Notification
{
    use Queueable;
    public $attestation;

    /**
     * Create a new notification instance.
     */
    public function __construct(Attestation $attestation)
    {
        $this->attestation = $attestation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Une nouvelle demande d\'attestation a été soumise.')
                    ->action('Voir la demande', url('/attestations/' . $this->attestation->id))
                    ->line('Merci de traiter cette demande.');
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
    public function toDatabase($notifiable)
    {
        return [
            'attestation_id' => $this->attestation['id'], // Assurez-vous que cette clé correspond à l' de l'atestation
            'description' => $this->attestation['description'], // ou toute autre clé utilisée pour stocker les informations sur l'attestation
            'type' => 'App\Notifications\NouvelleDemandeAttestation',
            'message' => 'Une nouvelle demande d\'attestation a été soumise.'
        ];
    }
}
