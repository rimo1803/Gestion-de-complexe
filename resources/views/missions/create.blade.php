@extends('layouts.main')

@section('content')

<style>
    /* Styles pour le formulaire */
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .form-container {
        width: 60%;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
    }

    /* Styles pour les étiquettes */
    label {
        font-weight: bold;
    }

    /* Styles pour les champs de formulaire */
    .form-group {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .form-group input,
    .form-group select {
        width: calc(50% - 5px);
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    /* Styles pour le bouton */
    button {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    /* Styles pour le bouton au survol */
    button:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <div class="form-container">
        <h1>Créer une nouvelle mission</h1>
        <form action="{{ route('missions.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="date_debut_mission">Date de début de mission</label>
                <input type="date" id="date_debut_mission" name="date_debut_mission" required>
            </div>
            <div class="form-group">
                <label for="date_fin_mission">Date de fin de mission</label>
                <input type="date" id="date_fin_mission" name="date_fin_mission" required>
            </div>
            <div class="form-group">
                <label for="heure_debut">Heure début</label>
                <input type="time" id="heure_debut" name="heure_debut" required>
            </div>
            <div class="form-group">
                <label for="heure_fin">Heure fin</label>
                <input type="time" id="heure_fin" name="heure_fin" required>
            </div>
            <div class="form-group">
                <label for="destination">Destination</label>
                <input type="text" id="destination" name="destination" required>
            </div>
            <div class="form-group">
                <label for="objet">Objet</label>
                <input type="text" id="objet" name="objet" required>
            </div>

            <div class="form-group">
                <label for="personnel_id">Personnel</label>
                <select id="personnel_id" name="personnel_id" required>
                    @foreach($personnels as $personnel)
                    <option value="{{ $personnel->id }}" data-immat="{{ $personnel->immat }}">{{ $personnel->Nomper }} {{ $personnel->prenomper }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="immat_pers">Immat personnel</label>
                <input type="text" id="immat_pers" name="immat_pers">

            </div>


            <button type="submit" style="background-color: green">Créer</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('personnel_id').addEventListener('change', function() {
        var selectedPersonnel = this.options[this.selectedIndex];
        var immat = selectedPersonnel.getAttribute('data-immat');
        document.getElementById('immat_pers').value = immat;
    });
</script>

@endsection
