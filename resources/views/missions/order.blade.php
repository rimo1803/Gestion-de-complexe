<!DOCTYPE html>
<html>
<head>
    <title>ORDRE DE MISSION</title>
    <style>
        /* Mettez ici votre style CSS pour le PDF */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>ORDRE DE MISSION</h1>
    <table>
        <tr>
            <th colspan="2">OFFICE DE LA FORMATION PROFESSIONNELLE ET DE LA PROMOTION DU TRAVAIL</th>
        </tr>
        <tr>
            <td colspan="2">DESIGNE</td>
        </tr>
        <tr>
            <td>Monsieur:</td>
            <td>{{ $mission->personnel->nom_complet }}</td>
        </tr>
        <tr>
            <td>Matricule:</td>
            <td>{{ $mission->personnel->immat_pers }}</td>
        </tr>
        <tr>
            <td>De se rendre à:</td>
            <td>{{ $mission->destination }}</td>
        </tr>
        <tr>
            <td colspan="2">Pour accomplir la mission suivante:</td>
        </tr>
        <tr>
            <td colspan="2">{{ $mission->objet }}</td>
        </tr>
        <tr>
            <td>Conducteur:</td>
            <td>Mle:</td>
        </tr>
        <tr>
            <td>Date de départ:</td>
            <td>{{ $mission->date_debut_mission }}</td>
        </tr>
        <tr>
            <td>Heure:</td>
            <td>{{ $mission->heure_debut }}</td>
        </tr>
        <tr>
            <td>Date de retour:</td>
            <td>{{ $mission->date_fin_mission }}</td>
        </tr>
        <tr>
            <td>Heure:</td>
            <td>{{ $mission->heure_fin }}</td>
        </tr>
        <tr>
            <td>L'intéressé(e) utilisera:</td>
            <td>Transport public</td>
        </tr>
        <tr>
            <td colspan="2">Cadre réservé à l'entité de destinations</td>
        </tr>
        <tr>
            <td>Visa d'arrivée</td>
            <td>Visa de départ</td>
        </tr>
        <tr>
            <td>Date et Heure d'arrivée</td>
            <td>Date et Heure de départ:</td>
        </tr>
        <tr>
            <td>Cachet et signature:</td>
            <td>Cachet et signature</td>
        </tr>
        <tr>
            <td>Le Directeur de Complexe</td>
            <td>Le Directeur Régional</td>
        </tr>
        <tr>
            <td colspan="2">NB: Le visa de départ est obligatoire pour les missions au-delà d'une journée sous format de tableau</td>
        </tr>
    </table>
</body>
</html>
