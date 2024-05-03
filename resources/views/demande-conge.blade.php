<!-- resources/views/demande-conge.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de Congé</title>
</head>
<body>
    <h1>Demande de Congé</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('demande-conge') }}">
        @csrf
        <label for="date_debut">Date de début :</label>
        <input type="date" id="date_debut" name="date_debut" required><br><br>

        <label for="date_fin">Date de fin :</label>
        <input type="date" id="date_fin" name="date_fin" required><br><br>

        <label for="descision_conge">Décision de congé :</label>
        <select id="descision_conge" name="descision_conge" required>
            <option value="Accepté">Accepté</option>
            <option value="Refusé">Refusé</option>
        </select><br><br>

        <label for="redicat">Redicat :</label>
        <input type="text" id="redicat" name="redicat" required><br><br>

        <label for="remplacement">Remplacement :</label>
        <input type="text" id="remplacement" name="remplacement" required><br><br>

        <label for="immat_per">Immatriculation de personnel :</label>
        <input type="text" id="immat_per" name="immat_per" required><br><br>

        <button type="submit">Soumettre</button>
    </form>
</body>
</html>
