@extends('layouts.main')

@section('content')
<head><!-- Ajouter ces lignes dans la section <head> de votre vue -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Ajouter ces scripts avant la fermeture du tag </body> de votre vue -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


    <style>/* Ajoutez ces styles à votre fichier de style CSS */

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 75px;
            padding-top: 85px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: center;
        }

        .table th {
            background-color: #125715;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            cursor: pointer;
            border-radius: 3px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .modal-dialog {
            max-width: 600px;
        }

        .modal-content {
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            background-color: #258508;
            color: #fff;
            border-radius: 5px 5px 0 0;
        }

        .modal-title {
            margin: 0;
            padding: 16px;
            font-size: 1.25rem;
        }

        .modal-body {
            padding: 16px;
        }

        .modal-footer {
            padding: 16px;
            border-top: 1px solid #e9ecef;
            border-radius: 0 0 5px 5px;
        }

        .close {
            color: #fff;
            opacity: 0.5;
        }

        .close:hover {
            opacity: 0.75;
        }
        h1{
            align-content: center;
            align-items: center;
        }

        </style>
    </head>
<body>

    <div class="container">
        <h1>Mes Congés</h1>
        <a href="{{ route('conges.create') }}" style="color: #125715">Créer une demande de congé</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conges as $conge)
                <tr>
                    <td>{{ $conge->date_debut }}</td>
                    <td>{{ $conge->date_fin }}</td>
                    <td>{{ $conge->status }}</td>
                    <td>
                        @if ($conge->status == 'en attente')
                        <a href="#" class="btn btn-primary edit-conge" style="background-color: #218838" data-conge-id="{{ $conge->id }}" data-toggle="modal" data-target="#editStudentModal{{$conge->id}}">Modifier</a>

                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $conge->id }}">Supprimer</a>
                    @elseif ($conge->status == 'acceptée' && $conge->decision_conge)
                        <a href="{{ route('conges.download', $conge) }}" class="btn btn-success">Télécharger décision</a>
                    @endif

                        <div class="modal fade" id="deleteModal{{ $conge->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirmer la suppression</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Êtes-vous sûr de vouloir supprimer ce congé ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <form action="{{ route('conges.destroy', $conge) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @if ($conge->status == 'acceptée' && $conge->decision_conge)
                            <a href="{{ route('conges.download', $conge) }}" class="btn btn-success">Télécharger décision</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- Edit Student Modal (for each student) -->
    @foreach($conges as $conge)
    <div class="modal fade" id="editStudentModal{{$conge->id}}" tabindex="-1" role="dialog"
        aria-labelledby="editStudentModalLabel{{$conge->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('conges.update', $conge->id) }}">

                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editStudentModalLabel {{$conge->id}}"><i class="fas fa-edit"></i> modifier demande de conge</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value=" {{$conge->id}}">
                        <div class="form-group">
                            <label for="date_debut"><i class="far fa-calendar-alt"></i>
                                date_debut</label>
                            <input type="text" name="date_debut" value=" {{$conge->date_debut}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="date_fin"><i class="far fa-calendar-alt"></i>
                                date_fin</label>
                            <input type="text" name="date_fin" value=" {{$conge->date_fin}}" class="form-control" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="background-color: #125715"><i class="fas fa-save"></i> Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</body>
@endsection
