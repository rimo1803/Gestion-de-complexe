@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Détails de la notification</h1>
                <ul>
                    <li><strong>Type:</strong> {{ $notification->type }}</li>
                    <li><strong>Data:</strong>
                        <ul>
                            @foreach($notification->data as $key => $value)
                                <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <!-- Bouton pour marquer la notification comme lue -->
                <form action="{{ route('notifications.markAsRead', ['id' => $notification->id]) }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn">Marquer comme lu</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
