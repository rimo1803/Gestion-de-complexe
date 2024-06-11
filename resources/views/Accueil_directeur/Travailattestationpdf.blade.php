<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Attestation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            margin-bottom: 10px;
        }
        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 30%;
        }
        table {
            width: 100%;
            border:1px solid black;
        }
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #0f0f0f;
        }
        .date{
            text-align: right;
        }

    </style>
</head>
<body>
    <div class="container">
        <header><img src="{{ asset('images/logo.png') }}"></header>
        <h3>Ref : {{$attestation->reference}} </h3>
        <p class="date"> Tetouan, le {{ $attestation->date_edition }}</p>
        <h1>Attestation de travail</h1><br><br>
        <p> Nous soussigne, Office de la Formation Professionnelle et de la Promotion du Travail,attestons que :
            <br>
        </p>
        <table>
            <tr>
                <td>Mr/Mme/Mle : {{ $attestation->personnel->Nomper }} {{ $attestation->personnel->prenomper }}
                <span class="date"> Matricule : {{ $attestation->personnel->immat }} </span></td>
            </tr>
            <tr>
                <td>Categorie : {{$attestation->travail->department}}</td>
            </tr>
            <tr>
                <td>Affectation : COMPLEXE DE FORMATION PROFESIONNELLE TETOUAN </td>
            </tr>
            <tr>
                <td>Est employe au sein de notre etablissement.</td>
            </tr>
            <tr>
                <td> Fonction : {{$attestation->travail->position}} </td>
            </tr>
            <tr>
                <td> La presente attestation est delivree a l'interesse pour servir et valoirce que de droit.</td>
            </tr>
        </table>
        <p> Directeur de CFP Tetouan </p><br><br><br><br>
        <footer>
            <p>COMPLEXE DE FORMATION PROFESSIONNELLE 2 TETOUAN : ISTA ROUTE DE SEBTA : AVENUE DES FAR ISMO TETOUAN : ZONE TETOUAN SHORE</p>
            <p>Tél - Fax : 0539970525 - Tél -Fax : 0539707402</p>
        </footer>
    </div>
</body>
</html>
