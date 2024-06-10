@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Notifications</h1>
            </div>
        </div>

        @if($notifications->isNotEmpty())
        <ul>
            @foreach($notifications as $notification)
                <li>
                    {{ $notification->data['message'] }} - {{ $notification->created_at->diffForHumans() }}
                    <a href="{{ route('notification.show', $notification->id) }}">Voir</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucune notification disponible.</p>
    @endif
</div>
</div>
@endsection
