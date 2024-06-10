@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Liste des moyens de transport</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type de transport</th>
                <th>Numéro d'immatriculation</th>
                <th>Marque</th>
                <th>Puissance fiscale</th>
            </tr>
        </thead>
        <tbody>
            @foreach($moyen_transports as $moyen_transport)
            <tr>
                <td>{{ $moyen_transport->id }}</td>
                <td>{{ $moyen_transport->type_trsp }}</td>
                <td>{{ $moyen_transport->num_immat }}</td>
                <td>{{ $moyen_transport->marque }}</td>
                <td>{{ $moyen_transport->puissance_fiscale }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
