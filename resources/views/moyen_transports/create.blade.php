@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Ajouter un moyen de transport</h1>
    <form action="{{ route('moyen_transports.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="type_trsp">Type de transport</label>
            <input type="text" class="form-control" id="type_trsp" name="type_trsp" required>
        </div>
        <div class="form-group">
            <label for="num_immat">Numéro d'immatriculation</label>
            <input type="text" class="form-control" id="num_immat" name="num_immat" required>
        </div>
        <div class="form-group">
            <label for="marque">Marque</label>
            <input type="text" class="form-control" id="marque" name="marque" required>
        </div>
        <div class="form-group">
            <label for="puissance_fiscale">Puissance fiscale</label>
            <input type="number" class="form-control" id="puissance_fiscale" name="puissance_fiscale" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
