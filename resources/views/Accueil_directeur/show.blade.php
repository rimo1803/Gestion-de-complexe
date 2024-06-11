@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 style="color:rgb(33, 33, 110)">Détails de la notification</h1>
                <ul style="list-style:none;">
                    <li><h3 style="color:rgb(77, 110, 83)"><strong>Type:</strong></h3> {{ $notification->type }}</li>
                    <li><h3 style="color:rgb(77, 110, 83)"><strong>Data:</strong></h3>
                        <ul style="list-style:none;">
                            @foreach($notification->data as $key => $value)
                                <li><h3 style="color:rgb(77, 110, 83)"><strong>{{ $key }}:</strong></h3> {{ $value }}</li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <!-- Bouton pour marquer la notification comme lue -->
                <form action="{{ route('notifications.markAsRead', ['id' => $notification->id]) }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn aj-btn">Marquer comme lu</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
