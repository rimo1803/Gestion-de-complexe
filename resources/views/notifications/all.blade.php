@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Toutes les notifications</div>

                <div class="card-body">
                    @if ($directeurNotifications->isEmpty())
                        <p>Aucune notification disponible.</p>
                    @else
                        <ul class="list-group">
                            @foreach ($directeurNotifications as $notification)
                                <li class="list-group-item">
                                    <strong>{{ $notification->data['subject'] }}</strong>
                                    <p>{{ $notification->data['message'] }}</p>
                                    <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                </li>
                            @endforeach
                        </ul>
                        {{ $directeurNotifications->links() }} <!-- Pour afficher la pagination -->
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
