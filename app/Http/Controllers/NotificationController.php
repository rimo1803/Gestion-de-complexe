<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use App\Notifications\JustificationRefuseeNotification;
use App\Notifications\JustificationAccepteeNotification;


class NotificationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $accepteeNotifications = $user->notifications()->where('type', JustificationAccepteeNotification::class)->paginate(10);
        $refuseeNotifications = $user->notifications()->where('type', JustificationRefuseeNotification::class)->paginate(10);

        return view('layouts.main', compact('accepteeNotifications', 'refuseeNotifications'));
    }
    public function index2()
    {
        $user = Auth::user();
        $directeurNotifications = $user->notifications()->where('type', 'App\Notifications\NouvelleJustificationDeposee')
                                             ->latest()
                                             ->take(2) // Limite à 2 notifications
                                             ->get();

        return view('layouts.master', compact('directeurNotifications'));
    }
    public function all()
    {
        $user = Auth::user();
        $directeurNotifications = $user->notifications()
                                        ->where('type', 'App\Notifications\NouvelleJustificationDeposee')
                                        ->latest()
                                        ->paginate(10); // Paginer les résultats pour une meilleure expérience utilisateur

        return view('notifications.all', compact('directeurNotifications'));
    }
    public function show($id)
{
    $notification = Auth::user()->notifications()->findOrFail($id);

    return view('notifications.show', compact('notification'));
}
}
