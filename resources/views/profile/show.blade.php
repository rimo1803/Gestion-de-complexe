<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
   <style>/* Styles généraux pour la page de profil */
    .container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
    }

    .card {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #125715;
        color: white;
        padding: 15px;
        border-bottom: 1px solid #ddd;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .card-header h1 {
        margin: 0;
        font-size: 24px;
    }

    .card-body {
        padding: 20px;
    }

    .profile-image {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 20px;
    }

    .user-detail {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .input1, .input2 {
        flex: 1;
        min-width: 200px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .form-control[disabled] {
        background-color: #f0f0f0;
        color: #888;
    }
    </style>
</head>
<body>

    @extends('layouts.main')

    @section('content')

        <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Profile</h1>
            </div>
            <div class="card-body">

                @if(auth()->check() && auth()->user()->photo_profil)
                    <img src="{{ asset('images\WhatsApp Image 2024-05-02 à 14.58.58_76d8c627.jpg')}}" alt="Photo de Profil" class="profile-image">
                @else
                    <img src="{{ asset('images/placeholder.jpg') }}" alt="Photo de Profil">
                @endif
                <div class="user-detail">
                    <div class="input1">
                <div class="form-group">
                    <label for="Nomper">Nom</label>
                    <input type="text" name="Nomper" class="form-control" value="{{ $personnel->Nomper }}" disabled>
                </div>

                <div class="form-group">
                    <label for="prenomper">Prénom</label>
                    <input type="text" name="prenomper" class="form-control" value="{{ $personnel->prenomper }}" disabled>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $personnel->email }}" disabled>
                </div>

                <div class="form-group">
                    <label for="immat">Immat</label>
                    <input type="text" name="immat" class="form-control" value="{{ $personnel->immat }}" disabled>
                </div>

                <div class="form-group">
                    <label for="date_naissance">Date de Naissance</label>
                    <input type="date" name="date_naissance" class="form-control" value="{{ $personnel->date_naissance }}" disabled>
                </div>

                <div class="form-group">
                    <label for="grade">Grade</label>
                    <input type="text" name="grade" class="form-control" value="{{ $personnel->grade }}" disabled>
                </div>
                </div>
                <div class="input2">
                <div class="form-group clearfix">
                <div class="form-group">
                    <label for="CIN">CIN</label>
                    <input type="text" name="CIN" class="form-control" value="{{ $personnel->CIN }}" disabled>
                </div>

                <div class="form-group">
                    <label for="date_affectation">Date d'Affectation</label>
                    <input type="date" name="date_affectation" class="form-control" value="{{ $personnel->date_affectation }}" disabled>
                </div>

                <div class="form-group">
                    <label for="diplome">Diplôme</label>
                    <input type="text" name="diplome" class="form-control" value="{{ $personnel->diplome }}" disabled>
                </div>

                <div class="form-group">
                    <label for="lieu_naissance">Lieu de Naissance</label>
                    <input type="text" name="lieu_naissance" class="form-control" value="{{ $personnel->lieu_naissance }}" disabled>
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" name="role" class="form-control" value="{{ $personnel->role }}" disabled>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" name="status" class="form-control" value="{{ $personnel->status }}" disabled>
                </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
</div>
</div>
    @endsection

</body>
</html>
