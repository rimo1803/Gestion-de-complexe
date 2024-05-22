<!-- liste_demandes_conge.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container" style="background-top:80px">
        <h1>Liste des demandes de congé</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Décision</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($demandes as $demande)
                    <tr>
                        <td>{{ $demande->date_debut }}</td>
                        <td>{{ $demande->date_fin }}</td>
                        <td>{{ $demande->decision_conje }}</td>
                        <td>
                            @if ($demande->decision_conje === 'En attente')
                                <form action="{{ route('conge.supprimer', $demande->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
