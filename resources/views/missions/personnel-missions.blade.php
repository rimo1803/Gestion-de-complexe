@extends('layouts.main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
    .container{
        padding: 100px;
    }
</style>

    <div class="container">
        <h1>Vos Missions</h1>
        <ul class="list-group">
            @foreach ($missions as $mission)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $mission->destination }}
                    <div class="btn-group" role="group" aria-label="Actions">
                        <a href="{{ route('missions.fillTransportForm', $mission->id) }}" class="btn btn-primary">
                            <i class="fas fa-truck"></i> Remplir le formulaire de transport
                        </a>
                        <a href="{{ route('missions.downloadMissionOrder', $mission->id) }}" class="btn btn-success">
                            <i class="fas fa-download"></i> Télécharger l'ordre de mission
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

