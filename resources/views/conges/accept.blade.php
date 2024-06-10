<!-- resources/views/conges/accept.blade.php -->

@extends('layouts.main')

@section('main-content')
    <div class="container">
        <h1>Accepter la demande de congé</h1>

        <form action="{{ route('conges.accept', $conge->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="remplacement">Remplacement</label>
                <input type="text" class="form-control" id="remplacement" name="remplacement" required>
            </div>

            <button type="submit" class="btn btn-success">Accepter</button>
        </form>
    </div>
@endsection
