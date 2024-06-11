@extends('layouts.main')

@section('content')
<style>.container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 2rem;
    background-color: #f0f2f5;
}

.password-change-wrapper {
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    max-width: 1200px;
    background: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

.image-container {
    flex: 1;
    min-width: 300px;
    max-width: 600px;
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.form-container {
    flex: 1;
    padding: 2rem;
}

.form-container h2 {
    margin-bottom: 1.5rem;
    font-size: 2rem;
    color: #333;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
    color: #555;
}

.form-group input {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.form-group input:focus {
    border-color: #007bff;
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.25);
}

.btn-primary {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    color: #fff;
    background-color: #0f6009;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0e8622;
}

.alert {
    margin-bottom: 1.5rem;
    padding: 1rem;
    border-radius: 4px;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
}
</style>
<div class="container">
    <div class="password-change-wrapper">
        <div class="image-container">
            <img src="{{ asset('images/Reset password-bro.png') }}" alt="Image Description">

        </div>
        <div class="form-container">
            <h2>Changer le mot de passe</h2>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="current_password">Mot de passe actuel</label>
                    <input type="password" name="current_password" id="current_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="new_password">Nouveau mot de passe</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">Confirmer le nouveau mot de passe</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
            </form>
        </div>
    </div>
</div>
@endsection
