<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ordre de Mission</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
        }
        .header, .footer {
            text-align: center;
            padding: 10px;
        }
        .content {
            margin: 20px;
        }
        .content h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .content table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .content table, .content th, .content td {
            border: 1px solid #000;
        }
        .content th, .content td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Ordre de Mission</h1>
    </div>
    <div class="content">
        <table>
            <tr>
                <th>Date de début de mission</th>
                <td>{{ $mission->date_debut_mission }}</td>
            </tr>
            <tr>
                <th>Date de fin de mission</th>
                <td>{{ $mission->date_fin_mission }}</td>
            </tr>
            <tr>
                <th>Heure début</th>
                <td>{{ $mission->heure_debut }}</td>
            </tr>
            <tr>
                <th>Heure fin</th>
                <td>{{ $mission->heure_fin }}</td>
            </tr>
            <tr>
                <th>Destination</th>
                <td>{{ $mission->destination }}</td>
            </tr>
            <tr>
                <th>Objet</th>
                <td>{{ $mission->objet }}</td>
            </tr>
            <tr>
                <th>Immat personnel</th>
                <td>{{ $mission->immat_pers }}</td>
            </tr>
            <tr>
                <th>Personnel</th>
                <td>{{ $mission->personnel->Nomper }} {{ $mission->personnel->prenomper }}</td>
            </tr>
            <tr>
                <th>Moyen de transport</th>
                <td>{{ $mission->moyenTransport->nom ?? 'Non assigné' }}</td>
            </tr>
        </table>
    </div>
    <div class="footer">
        <p>Signature du directeur: _________________________</p>
        <p>Date: _________________________</p>
    </div>
</body>
</html>
