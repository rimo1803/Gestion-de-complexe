@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PjeNd7e1l8C4ZPHjhL2rXkDWQmM+LvV9r2hBzvE5NGeD7oINiSZn1oEsnFJz5fqu" crossorigin="anonymous">

<style>
    .container {
        padding: 70px;
    }

    .btn {
        margin-right: 5px;
    }

    th {
        background-color: #0c6621;
        color: white;
    }



    th {
        max-width: 100px; /* Définir la largeur maximale */
        overflow: hidden; /* Masquer tout contenu dépassant */
        text-overflow: ellipsis; /* Afficher des points de suspension pour le texte dépassant */
    }

    .btn-edit {
        color: #77e784;
        margin-right: 5px;
    }

    .btn-download {
        color: #3cb531;
    }
td{
    width: 20px;
}

</style>

<div class="container">
    <h1>Liste des missions</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('missions.create') }}" ><i class="fas fa-plus"></i> Créer une nouvelle mission</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Début de mission</th>
                <th>Fin de mission</th>
                <th>Heure début</th>
                <th>Heure fin</th>
                <th>Destination</th>
                <th>Objet</th>
                <th>Immat personnel</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($missions as $mission)
            <tr>
                <td>{{ $mission->id }}</td>
                <td>{{ $mission->date_debut_mission }}</td>
                <td>{{ $mission->date_fin_mission }}</td>
                <td>{{ $mission->heure_debut }}</td>
                <td>{{ $mission->heure_fin }}</td>
                <td>{{ $mission->destination }}</td>
                <td>{{ $mission->objet }}</td>
                <td>{{ $mission->immat_pers }}</td>
                <td>
                    <a href="{{ route('missions.edit', $mission->id) }}" class="btn btn-edit btn-sm"><i class="fas fa-edit"></i> Modifier</a>
                    <a href="{{ route('missions.downloadPDF', $mission->id) }}" class="btn btn-download btn-sm"><i class="fas fa-download"></i> Télécharger PDF</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
