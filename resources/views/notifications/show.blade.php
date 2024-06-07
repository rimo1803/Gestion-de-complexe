@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Détails de la notification</div>

                <div class="card-body">
                    <strong>Sujet :</strong> {{ $notification->data['subject'] }} <br>
                    <strong>Message :</strong> {{ $notification->data['message'] }} <br>
                    <strong>Date :</strong> {{ $notification->created_at->format('d/m/Y H:i:s') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
