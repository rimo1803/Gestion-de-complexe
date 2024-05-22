<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <style>

      body {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
    margin: 0;
    background-color: #f8f9fa;
    font-family: Arial, sans-serif;
}

.container {
    margin: 110px 10px 0 10px;
    max-width: 600px;
    width: 100%;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #343a40;
}

.card {
    background-color: #ffffff;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-left: 200px
}

.card-header {
    background-color: #007bff;
    color: #ffffff;
    padding: 10px 20px;
    border-bottom: 1px solid #dee2e6;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}


.card-body {
    padding: 20px;

    align-items: center;
   width: 800px;
   justify-content: flex-end;
   align-items: center;

}

.profile-image {
    width: 100px;
    height: 100px;

    object-fit: cover;
    border: 3px solid #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}


.form-group {
    margin-bottom: 15px;
    width: 100px;
}

.form-group label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
    color: #495057;
    width: 200px;
}
.user-detail {
    display: flex; /* Utiliser flexbox */
    gap: 120px;
    align-items: center;

}

.input1, .input2 {
    flex: 1; /* Les deux éléments occupent la même largeur */
    
    gap: 100px;
}

.input1 {
    margin-right: 10px; /* Ajouter une marge à droite pour séparer les éléments */
}

.form-group input {
    width: calc(100% - 20px);

    border: 1px solid #ced4da;
    border-radius: 4px;
    font-size: 16px;
    color: #495057;
    width: 300px;

}
.form-group.flex {
    display: flex;
    flex-direction: row;
    justify-content: space-between; /* Pour espacer les éléments */
    align-items: center; /* Pour aligner verticalement les éléments */
}

.form-group.flex .form-control {
    width: 48%; /* Ajustez la largeur selon vos préférences */
}


    </style>
</head>
<body>

    @extends('layouts.master')

    @section('content')

        <div class="container">


        <div class="card">
            <div class="card-header">
                <h1>Profile</h1>
            </div>
            <div class="card-body">

                @if(auth()->check() && auth()->user()->photo_profil)
                    <img src="{{ asset('storage/profile_pictures/'.basename(auth()->user()->photo_profil)) }}" alt="Photo de Profil" class="profile-image">
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
                    <label for="role_id">Role</label>
                    <input type="text" name="role_id" class="form-control" value="{{ $personnel->role->name }}" disabled>
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
