
@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



<style>
.container{
    padding-left: 120px;
    padding-top: 90px;

}
</style>

    <div class="container">
        <h1>Remplir le formulaire de moyen de transport</h1>
        <div class="row">
            <div class="col-md-4">

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
                    <div class="col-md-6">

                        <button type="submit"  style="background-color: rgb(94, 170, 94)"  class="btn"><i class="fas fa-save"></i> Enregistrer</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/Car driving-rafiki.png') }}" alt="Image" class="img-fluid">

            </div>
        </div>
    </div>
@endsection

