<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NouvelleJustificationDeposee extends Notification
{
    use Queueable;

    protected $abscenceData;
    public function __construct($abscenceData)
    {
        $this->abscenceData = $abscenceData;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->line('Une nouvelle justification a été déposée par ' . $this->abscenceData['personnel'])
        ->action('Voir la justification', url('/abscences/' . $this->abscenceData['id'] . '/download'))
        ->line('Merci de vérifier et de prendre une action appropriée.');
    }


    //affichage des notifications
    public function toDatabase($notifiable)
    {
        return [
            'abscence_id' => $this->abscenceData['id'], // Assurez-vous que cette clé correspond à l'identifiant de l'absence
            'personnel' => $this->abscenceData['personnel'], // ou toute autre clé utilisée pour stocker les informations sur le personnel
            'type' => 'App\Notifications\NouvelleJustificationDeposee',
            'message' => 'Une nouvelle justification a été déposée.'
        ];
    }
}
