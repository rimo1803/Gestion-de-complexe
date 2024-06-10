@extends('layouts.main')

@section('content')
<style>/* public/css/custom.css */

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .container {
        text-align: center;
        max-width: 800px;
        width: 100%;
        margin: 0 auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
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

     <h1>Modifier une demande de congé</h1>

     <!-- Formulaire de modification -->
<form id="editForm" action="{{ route('conges.update', $conge->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="conge_id" value="{{ $conge->id }}">
    <div class="form-group">
        <label for="date_debut">Date de début</label>
        <input type="date" class="form-control" id="date_debut" name="date_debut" value="{{ $conge->date_debut }}" required>
    </div>
    <div class="form-group">
        <label for="date_fin">Date de fin</label>
        <input type="date" class="form-control" id="date_fin" name="date_fin" value="{{ $conge->date_fin }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

 @endsection
