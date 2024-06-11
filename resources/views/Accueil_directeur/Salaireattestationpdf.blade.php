<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            margin-bottom: 20px;
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

        .date {
            text-align: right;
        }

        h3 {
            text-align: center;
        }


    </style>
</head>

<body>
    <div class="container">
        <h1>ATTESTATION DE SALAIRE</h1>
        <p><strong>N/Ref : {{ $attestation->reference }}</strong></p>
        <p class="date"> Tetouan, le {{ $attestation->date_edition }}</p>
        <p> Nous soussigne, Office de la Formation Professionnelle et de la Promotion du Travail,attestons que :
            <br>
        </p>
        <p>Mr/Mme/Mle : {{ $attestation->personnel->Nomper }} {{ $attestation->personnel->prenomper }}</p>
        <p> <strong>Affectation : COMPLEXE DE FORMATION PROFESIONNELLE TETOUAN </strong></p>
        <h3> CENTRE DE FORMATION DE LA FEMME TETOUAN </h3>
        <p>Est employe au sein de notre etablissement et percoit un salaire mensuel de : </p>
        <p> SALAIRE DE BASE {{ $attestation->salaire->salary }}<br>
            <p>L'interesse percoit un 13eme mois chaque annee.</p>
            <br>
            <p> La presente attestation est delivree a l'interesse pour servir et valoirce que de droit. </p>
            <p> Directeur du Complexe </p><br><br><br><br>
            <footer>
                <p>COMPLEXE DE FORMATION PROFESSIONNELLE 2 TETOUAN : ISTA ROUTE DE SEBTA : AVENUE DES FAR ISMO TETOUAN :
                    ZONE TETOUAN SHORE</p>
                <p>Tél - Fax : 0539970525 - Tél -Fax : 0539707402</p>
            </footer>
    </div>
</body>

</html>
