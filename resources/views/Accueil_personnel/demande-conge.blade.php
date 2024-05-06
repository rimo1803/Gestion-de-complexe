@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Demande de Congé</div>
                    <div class="card-body">
                        <p>Nom : {{ Auth::user()->nomper }}</p>
                        <p>Prénom : {{ Auth::user()->prenomper }}</p>
                        <p>Email : {{ Auth::user()->email }}</p>
                        <p>CIN : {{ Auth::user()->CIN }}</p>
                        <!-- Ajoutez d'autres informations personnelles ici -->

                        <form method="POST" action="{{ route('demande.conge.submit') }}">
                            @csrf

                            <div class="form-group">
                                <label for="date_debut">Date de Début</label>
                                <input id="date_debut" type="date" class="form-control" name="date_debut" value="{{ old('date_debut') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="date_fin">Date de Fin</label>
                                <input id="date_fin" type="date" class="form-control" name="date_fin" value="{{ old('date_fin') }}" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Envoyer la Demande</button>
                                <a href="{{ route('accueil') }}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
