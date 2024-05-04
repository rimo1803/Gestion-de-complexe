<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer un utilisateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: rgb(2,0,36);
            background: linear-gradient(70deg, rgba(2,0,36,1) 0%, rgba(9,45,121,1) 51%, rgba(0,212,255,1) 100%);
        }

        .container {
            width: 800px; /* Adjust width as needed */
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
        }

        .form-group label {
            flex: 1;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            flex: 2;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Créer un utilisateur</h1>
    <form method="POST" action="{{ route('personnels.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="Nomper">Nomper:</label>
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
        <div class="form-group">
            <label for="immat">Immat:</label>
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
        <div class="form-group">
            <label for="lieu_naissance">Lieu de naissance:</label>
            <input type="text" name="lieu_naissance" id="lieu_naissance" value="{{ old('lieu_naissance') }}" required>
            @error('lieu_naissance')
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
        <button type="submit">Créer Utilisateur</button>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
</div>
</body>
</html>
