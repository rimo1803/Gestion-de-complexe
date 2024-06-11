<?php
namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NouvelleDemandeAttestation;
use App\Notifications\NouvelleJustificationDeposee;
use App\Notifications\JustificationRefuseeNotification;
use App\Notifications\JustificationAccepteeNotification;

class NotificationController extends Controller {
    public function index() {
        $user = Auth::user();
        $accepteeNotifications = $user->notifications()->where(
            'type', JustificationAccepteeNotification::class)->paginate(10);
            $refuseeNotifications = $user->notifications()->where('
            type', JustificationRefuseeNotification::class)->paginate(10);
        return view('layouts.main', compact('accepteeNotifications', 'refuseeNotifications'));
    }
    public function index2() {
        $user = Auth::user();
        $notifications = $user->notifications()
            ->whereIn('type', [
                NouvelleJustificationDeposee::class,
                NouvelleDemandeAttestation::class
            ])
            ->whereNull('read_at') 
            ->latest()
            ->paginate(10);
        return view('Accueil_directeur.notification', compact('notifications'));
        }
    public function show($id) {
        $notification = Notification::findOrFail($id);
    // Vérifiez si la notification appartient à l'utilisateur authentifié
    if ($notification->notifiable_id !== Auth::id()) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    return view('Accueil_directeur.show', compact('notification'));
}

    public function markAsRead($id) {
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->markAsRead(); // Marquer la notification comme lue
        return redirect()->route('notifications.index');;
    }
}
