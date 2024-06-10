@extends('layouts.main')

@section('content')
<style>
    /* public/css/custom.css */
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 900px;
        height: 500px;
        width: 100%;
        margin: 0 auto;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    form {
        flex: 1;
        margin-left: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="date"],
    input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 3px;
        box-sizing: border-box;
    }

    button {
        background-color: #3bac52;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }

    button:hover {
        background-color: #4cd583;
    }

    img {
        max-width: 500px;
        height: auto;
    }
</style>

<div class="container">

    <img src="{{ asset('images/Forms-amico.png') }}" alt="Image" />
    <form action="{{ route('conges.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="date_debut">Date de début :</label>
            <input type="date" id="date_debut" name="date_debut" required>
        </div>

        <div class="form-group">
            <label for="date_fin">Date de fin :</label>
            <input type="date" id="date_fin" name="date_fin" required>
        </div>

        <div class="form-group">
            <label for="reliquat">Reliquat :</label>
            <input type="text" id="reliquat" name="reliquat" readonly>
        </div>

        <button type="submit">Soumettre</button>
    </form>
</div>

<script>
    document.getElementById('date_debut').addEventListener('change', calculateReliquat);
    document.getElementById('date_fin').addEventListener('change', calculateReliquat);

    function calculateReliquat() {
        const dateDebut = new Date(document.getElementById('date_debut').value);
        const dateFin = new Date(document.getElementById('date_fin').value);

        if (dateDebut && dateFin) {
            const timeDiff = Math.abs(dateFin.getTime() - dateDebut.getTime());
            const diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            document.getElementById('reliquat').value = diffDays;
        } else {
            document.getElementById('reliquat').value = '';
        }
    }
</script>
@endsection
