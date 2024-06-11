@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row my-5">
                <div class="col-md-10 mx-auto">
                    <div class="card my-3">
                        <div class="card-header">
                            <h4 class="text-center">MES CONGES</h4>
                        </div>
                        <a href="{{ route('conges.create') }}" style="color: #125715">
                            <i class="la la-calendar-plus-o"></i> Créer une demande de congé
                        </a>

        <div class="card-body">
            <table id="myTable" class="table table-boredered table-striped">
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
                        <a href="#" class="btn edit-conge" style="background-color: #218838; color: rgb(9, 9, 9)" data-conge-id="{{ $conge->id }}" data-toggle="modal" data-target="#editStudentModal{{$conge->id}}">
                            <i class="fas fa-edit"></i> Modifier
                        </a>

                        <a href="#" class="btn btn-danger" style="color: black" data-toggle="modal" data-target="#deleteModal{{ $conge->id }}">
                            <i class="fas fa-trash-alt"></i> Supprimer
                        </a>

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
                        <button type="submit" class="btn " style="background-color: #125715"><i class="fas fa-save"></i> Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</body>
@endsection
