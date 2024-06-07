@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <section class="table__header">
            <h1>Liste des Abscences</h1>
            <!-- Importation  -->
            <div class="importation">
                <form action="" method="POST" enctype="multipart/form-data" id="import-form">
                    @csrf
                    <input type="file" name="file" id="file-input" style="display: none;">
                    <label for="file-input" class="file-input-label">
                        <ion-icon name="cloud-download-outline" style="font-size: 30px; color: #3757c0; cursor: pointer;"></ion-icon>
                    </label>
                    <button type="submit" id="upload-button" style="display: none;">Upload</button>
                </form>
            </div>
            <!-- Exportation  -->
            <div class="exportation">
                <form action="" method="POST" id="export-form">
                    @csrf
                    <input type="text" name="name" placeholder="Nom de fichier" class="inpe">
                    <button type="submit" id="export-button" style="display: none;">Export</button>
                    <label for="export-button" class="export-label">
                        <ion-icon name="cloud-upload-outline" style="font-size: 30px; color: #3757c0; cursor: pointer;"></ion-icon>
                    </label>
                </form>
            </div>
            <!-- ajouter une abscence  -->
            <button type="button" class="btn">
                <ion-icon name="add-circle-outline" style="font-size: 35px; color:#3757c0;"></ion-icon>
            </button>
        </section>

        <section class="table__body">
            <table id="abs-table">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Date de debut</th>
                        <th>Date de fin</th>
                        <th>Type de l'abscence</th>
                        <th>Date Affectaion</th>
                        <th>Matricule</th>
                        <th>Nom Complet</th>
                        <th> Actions </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abscences as $key => $abscence)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $abscence->date_debut }}</td>
                            <td>{{ $abscence->date_fin }}</td>
                            <td>{{ $abscence->type_abscence }}</td>
                            <td>{{ $abscence->personnel->date_affectation }}</td>
                            <td>{{ $abscence->personnel->immat }}</td>
                            <td>{{ $abscence->personnel->Nomper }} {{ $abscence->personnel->prenomper }}</td>
                            <td>
                                @if ($abscence->type_abscence==="justifiée")
                                    <ion-icon name="checkmark-done-circle-outline" style="font-size: 30px; color: #4CAF50;"></ion-icon>

                                @elseif($abscence->type_abscence==="en_attente")
                                    <a href="{{ route('downloadJustification', ['id' => $abscence->id]) }}" class="download-icon">
                                        <ion-icon name="download-outline" style="font-size: 30px; color: #5239ac;"></ion-icon>
                                    </a>
                                    <button onclick="changeAbscenceType({{ $abscence->id }}, 'justifiée')" class="btn-justify">
                                        Accepter
                                    </button>
                                    <button onclick="changeAbscenceType({{ $abscence->id }}, 'non justifiée')" class="btn-justify">
                                        Refuser
                                    </button>
                                @else
                                    <ion-icon name="alert-outline" style="font-size: 30px; color: #F44336;"></ion-icon>
                                @endif
                            </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pag">
                {!! $abscences->links() !!}
            </div>
        </section>
    </div>
</div>
<script>
    function changeAbscenceType(abscenceId, newType) {
        if (confirm("Êtes-vous sûr de vouloir modifier le type de cette absence?")) {
            // Utilisez jQuery pour envoyer une requête Ajax au serveur
            $.ajax({
                url: '/abscences/' + abscenceId + '/change-type',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    type: newType
                },
                success: function(response) {
                    console.log('Response:', response); // Ajoutez cette ligne pour le débogage
                    // Si la requête est réussie, affichez un message de succès et rechargez la page
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert('Une erreur s\'est produite : ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Status:', status);
                    console.error('Error:', error);
                    console.error('Response:', xhr.responseText);
                    alert('Une erreur s\'est produite lors de la modification du type d\'absence.');
                }
            });
        }
    }
</script>


@endsection

