<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
.container{
    padding: 150px;

}
</style>
@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Remplir le formulaire de moyen de transport</h1>
                <form action="{{ route('missions.storeTransportForm', $mission->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="type_trsp" class="form-label">Type de transport:</label>
                        <input type="text" class="form-control" id="type_trsp" name="type_trsp" required>
                    </div>
                    <div class="mb-3">
                        <label for="num_immat" class="form-label">Numéro d'immatriculation:</label>
                        <input type="text" class="form-control" id="num_immat" name="num_immat" required>
                    </div>
                    <div class="mb-3">
                        <label for="marque" class="form-label">Marque:</label>
                        <input type="text" class="form-control" id="marque" name="marque" required>
                    </div>
                    <div class="mb-3">
                        <label for="puissance_fiscale" class="form-label">Puissance fiscale:</label>
                        <input type="number" class="form-control" id="puissance_fiscale" name="puissance_fiscale" required>
                    </div>
                    <button type="submit"  style="background-color: green"  ><i class="fas fa-save"></i> Enregistrer</button>
                </form>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/Car driving-rafiki.png') }}" alt="Image" class="img-fluid">

            </div>
        </div>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
