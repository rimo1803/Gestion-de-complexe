<!DOCTYPE html>
<html>
<head>
    <title>Ordre de Mission</title>
</head>
<body>
    <h1>Ordre de Mission</h1>
    <p>Destination: {{ $mission->destination }}</p>
    <p>Objet: {{ $mission->objet }}</p>
    <p>Date de début: {{ $mission->date_debut_mission }}</p>
    <p>Date de fin: {{ $mission->date_fin_mission }}</p>
    <h2>Moyen de Transport</h2>
    <p>Type: {{ $moyenTransport->type_trsp }}</p>
    <p>Numéro d'immatriculation: {{ $moyenTransport->num_immat }}</p>
    <p>Marque: {{ $moyenTransport->marque }}</p>
    <p>Puissance fiscale: {{ $moyenTransport->puissance_fiscale }}</p>
</body>
</html>
