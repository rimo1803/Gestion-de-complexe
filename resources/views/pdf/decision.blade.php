<!DOCTYPE html>
<html>
<head>
    <title>Décision de Congé</title>

</head>
<body>

    <div style="text-align: center;">

        <h2>Office de la Formation Professionnelle et de la Promotion du Travail</h2>

    </div>

    <h1><strong>DECISION DE CONGE ADMINISTRATIF</strong></h1>

  <strong>{{ $conge->status }}</strong>
    <p>Le directeur de l'Office de la Formation Professionnelle et de la Promotion du Travail :</p>
    <p>- Vu le Dahir portant loi N° l-72-183 Rabia II 1394 (21 Mai 1974) instituant l'Office de la Formation Professionnelle et de la Promotion du Travail;</p>
    <p>- Vu la décision de Madame le Directeur Général N° 1480 en date du 03/11/2023 portant la nomination de Directeur de complexe de formation Professionnelle Tetouan 2;</p>
    <p>- Vu la demande de congé administratif de M./Mme <strong>{{ $conge->personnel->Nomper }} {{ $conge->personnel->Prenomper }}</strong> en date du <strong>{{ $conge->date_debut }}</strong> au <strong>{{ $conge->date_fin }}</strong>;</p>
    <h3>- Décide :</h3>
    <p>Article 1 : Est accordé à l'agent susmentionné un congé administratif de <strong>{{ $conge->reliquat }}</strong> jours ouvrables à compter du <strong>{{ $conge->date_debut }}</strong>.</p>
    <p>Article 2 : Le présent arrêté sera enregistré, publié et communiqué partout où besoin sera.</p>

    <footer>
        <h3><strong>Fait à Tetouan, le {{ date('d/m/Y') }}</strong></h3>
    </footer>
</body>
</html>
