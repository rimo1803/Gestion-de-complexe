@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        @if($notifications->isNotEmpty())
        @php $counter = 1; @endphp
            @foreach($notifications as $notification)
                <div class="card text-center" style="width: 25rem;">
                    <div class="card-header"> Notification n° {{ $counter }} </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $notification->data['message'] }}</h5>
                        <a href="{{ route('notification.show', $notification->id) }}" class="btn ajt">Plus</a>
                    </div>
                    <div class="card-footer text-muted">
                        {{ $notification->created_at->diffForHumans() }}
                    </div>
                </div>
                @php $counter++; @endphp
            @endforeach
        @else
            <div class="alert alert-primary" role="alert">
                Aucune notification disponible.
            </div>
        @endif
        {{-- <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 style="color:darkcyan">Notifications</h1>
            </div>
        </div>

        @if($notifications->isNotEmpty())
            @foreach($notifications as $notification)
                <div class="alert alert-primary" role="alert">
                    <strong>{{ $notification->data['message'] }} </strong> - {{ $notification->created_at->diffForHumans() }}
                    <a href="{{ route('notification.show', $notification->id) }}">Voir</a>
                </div>
            @endforeach
        @else
            <div class="alert alert-primary" role="alert">
                Aucune notification disponible.
            </div>
        @endif
</div> --}}
</div>
@endsection
