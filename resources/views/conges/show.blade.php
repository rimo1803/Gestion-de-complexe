<!-- resources/views/conges/show.blade.php -->

@extends('layouts.main')

@section('main-content')
<div class="container">
    <h1>Détails de la demande de congé</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $conge->date_debut }} - {{ $conge->date_fin }}</h5>
            <p class="card-text">Status : {{ $conge->status }}</p>
            <p class="card-text">Reliquat : {{ $conge->reliquat }} jours</p>
            <p class="card-text">Remplacement : {{ $conge->remplacement }}</p>

            @if($conge->status == 'accepté' && $conge->decision_conge)
                <a href="{{ route('conges.downloadDecision', $conge->id) }}" class="btn btn-success">Télécharger la décision</a>
            @endif

            <a href="{{ route('conges.index') }}" class="btn btn-secondary">Retour</a>
        </div>
    </div>
</div>
@endsection
