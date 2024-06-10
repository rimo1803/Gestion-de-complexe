@extends('layouts.main')

@section('content')

<style>
    /* public/css/custom.css */

    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        max-width: 800px;
        width: 100%;
        margin: 20px auto;
        padding: 50px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .image-container {
        flex: 1;
        margin-right: 20px;
    }

    .image-container img {
        max-width: 100%;
        height: auto;
    }

    table {
        flex: 2;
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    a {
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    button {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    button:hover {
        background-color: #c82333;
    }
</style>

<div class="container">

    <h1>Demandes de congé en attente</h1>

    <div class="image-container">
        <img src="{{ asset('images\college admission-bro.png') }}" alt="Image" />
    </div>

    <table>
        <tr>
            <th>Personnel</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Actions</th>
        </tr>
        @foreach ($conges as $conge)
        <tr>
            <td>{{ $conge->personnel->Nomper }}</td>
            <td>{{ $conge->date_debut }}</td>
            <td>{{ $conge->date_fin }}</td>
            <td>
                <form action="{{ route('conges.decision', $conge) }}" method="POST" style="display:inline;">
                    @csrf
                    <div class="form-group">
                        <select class="form-control" name="remplacement">
                            <option value="">Sélectionnez un remplaçant</option>
                            @foreach($personnels as $personnel)
                            <option value="{{ $personnel->id }}">{{ $personnel->Nomper }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="decision" value="acceptée">
                    <button type="submit" style="background-color: green">Accepter</button>
                </form>
                <form action="{{ route('conges.decision', $conge) }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" name="decision" value="refusée">
                    <button type="submit">Refuser</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection
