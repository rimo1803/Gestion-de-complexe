@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .user-form {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .user-form .form-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .user-form .form-group {
            flex: 0 0 48%;
        }

        .user-form .form-group label {
            display: block;
            margin-bottom: 0.5rem;
        }

        .user-form .form-group input,
        .user-form .form-group select {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .user-form .form-group .text-danger {
            display: block;
            margin-top: 0.5rem;
        }

        .user-form .btn-submit {
            display: block;
            width: 100%;
            padding: 1rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.25rem;
            cursor: pointer;
            margin-top: 1rem;
        }

        .user-form .btn-submit:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-top: 1rem;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
            text-align: center;
            margin-top: 80px;
        }

        </style>
</head>
<body>

    <div class="container">
        <h1>Créer un utilisateur</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('personnels.store') }}" enctype="multipart/form-data" class="user-form">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label for="Nomper">Nom:</label>
                    <input type="text" name="Nomper" id="Nomper" value="{{ old('Nomper') }}" required>
                    @error('Nomper')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="prenomper">Prénom:</label>
                    <input type="text" name="prenomper" id="prenomper" value="{{ old('prenomper') }}" required>
                    @error('prenomper')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe:</label>
                    <input type="password" name="password" id="password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="password_confirmation">Confirmer Mot de passe:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="immat">Immatriculation:</label>
                    <input type="text" name="immat" id="immat" value="{{ old('immat') }}" required>
                    @error('immat')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="date_naissance">Date de naissance:</label>
                    <input type="date" name="date_naissance" id="date_naissance" value="{{ old('date_naissance') }}" required>
                    @error('date_naissance')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="grade">Grade:</label>
                    <input type="text" name="grade" id="grade" value="{{ old('grade') }}" required>
                    @error('grade')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="CIN">CIN:</label>
                    <input type="text" name="CIN" id="CIN" value="{{ old('CIN') }}" required>
                    @error('CIN')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="date_affectation">Date d'affectation:</label>
                    <input type="date" name="date_affectation" id="date_affectation" value="{{ old('date_affectation') }}" required>
                    @error('date_affectation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="diplome">Diplôme:</label>
                    <input type="text" name="diplome" id="diplome" value="{{ old('diplome') }}" required>
                    @error('diplome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="lieu_naissance">Lieu de naissance:</label>
                    <input type="text" name="lieu_naissance" id="lieu_naissance" value="{{ old('lieu_naissance') }}" required>
                    @error('lieu_naissance')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">Rôle:</label>
                    <select name="role" id="role" required>
                        <option value="personnel" {{ old('role') == 'personnel' ? 'selected' : '' }}>Personnel</option>
                        <option value="directeur" {{ old('role') == 'directeur' ? 'selected' : '' }}>Directeur</option>
                    </select>
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="status">Statut:</label>
                    <input type="text" name="status" id="status" value="{{ old('status') }}" required>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo_profil">Photo de profil:</label>
                    <input type="file" name="photo_profil" id="photo_profil">
                    @error('photo_profil')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn-submit">Créer l'utilisateur</button>
        </form>
    </div>
    @endsection
</body>
</html>
