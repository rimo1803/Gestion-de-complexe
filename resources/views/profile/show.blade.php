<!-- resources/views/profile/show.blade.php -->

@extends('layouts.master')

@section('content')
<div class="container" style="margin-right: 110px">
    <h1>Profile</h1>

    <div class="card">
        <div class="card-header">
            Profile Information
        </div>
        <div class="card-body">
            @if($personnel->photo_profil)
                <div class="form-group">
                    <label for="photo_profil">Profile Photo</label>
                    <div>
                        <img src="{{ asset('storage/public/profile_pictures/' . auth()->user()->photo_profil) }}"
                        alt="Profile Photo" style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                </div>
            @endif

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
@endsection
