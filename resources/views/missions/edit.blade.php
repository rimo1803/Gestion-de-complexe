@extends('layouts.main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* Conteneur principal */
    .container {
        padding-top: 100px;
        padding-left: 100px;
        display: flex;
        justify-content: space-between;
        align-items: flex-start; /* Aligner les éléments en haut */
    }

    /* Style pour le formulaire */
    form {
        width: 60%; /* Largeur du formulaire */
    }

    /* Style pour l'image */
    .image-container {
        width: 70%; /* Largeur de l'image */
        margin-left: 20px; /* Espacement entre le formulaire et l'image */
    }

    /* Pour rendre l'image réactive et ne pas déborder */
    .image-container img {
        max-width: 100%;
        height: auto;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.min.js"></script>
<div class="container">

    <form action="{{ route('missions.update', $mission->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="date_debut_mission">Date de début de mission</label>
            <input type="date" class="form-control" id="date_debut_mission" name="date_debut_mission" value="{{ $mission->date_debut_mission }}" required>
        </div>

        <div class="form-group">
            <label for="date_fin_mission">Date de fin de mission</label>
            <input type="date" class="form-control" id="date_fin_mission" name="date_fin_mission" value="{{ $mission->date_fin_mission }}" required>
        </div>
        <div class="form-group">
            <label for="heure_debut">Heure début</label>
            <input type="time" class="form-control" id="heure_debut" name="heure_debut" value="{{ $mission->heure_debut }}" required>
        </div>
        <div class="form-group">
            <label for="heure_fin">Heure fin</label>
            <input type="time" class="form-control" id="heure_fin" name="heure_fin" value="{{ $mission->heure_fin }}" required>
        </div>
        <div class="form-group">
            <label for="destination">Destination</label>
            <input type="text" class="form-control" id="destination" name="destination" value="{{ $mission->destination }}" required>
        </div>
        <div class="form-group">
            <label for="objet">Objet</label>
            <input type="text" class="form-control" id="objet" name="objet" value="{{ $mission->objet }}" required>
        </div>
        <div class="form-group">
            <label for="immat_pers">Immat personnel</label>
            <input type="text" class="form-control" id="immat_pers" name="immat_pers" value="{{ $mission->immat_pers }}" required>
        </div>
        <div class="form-group">
            <label for="personnel_id">Personnel</label>
            <select class="form-control" id="personnel_id" name="personnel_id" required>
                @foreach($personnels as $personnel)
                    <option value="{{ $personnel->id }}" {{ $mission->personnel_id == $personnel->id ? 'selected' : '' }}>
                        {{ $personnel->Nomper}} {{ $personnel->prenomper }}
                    </option>
                @endforeach
            </select>
        </div>



        <button type="submit"  style="background-color: green">Mettre à jour </button>
    </form>

    <div class="image-container">
        <img src="{{ asset('images/Business Plan-bro.png') }}" alt="Image">
    </div>
</div>
@endsection
