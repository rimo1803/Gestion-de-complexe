@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header bg-white text-center p-3">
                    <h3 class="text-dark">
                        Modifier les informations de
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" action="{{ route('update',$personnel->immat) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="nom" class="form-label fw-bold">Nom du personnel</label>
                            <input type="text" name="nom" value="{{old("Nomper",$personnel->Nomper)}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="prenom" class="form-label fw-bold">Prenom du personnel</label>
                            <input type="text" name="prenom" value="{{old("prenomper",$personnel->prenomper)}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="immat">Matricule</label>
                            <input type="text" name="immat" value="{{old("immat",$personnel->immat)}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="email">Email</label>
                            <input type="text" class="form-control" value="{{old("email",$personnel->prenomper)}}"  name="email" >
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="cin">CIN</label>
                            <input type="text" class="form-control" value="{{old("cin",$personnel->CIN)}}"  name="cin" >
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="date_naissance">Date de naissance</label>
                            <input type="date" class="form-control" value="{{old("date_naissance",$personnel->date_naissance)}}" name="date_naissance">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="grade">grade</label>
                            <input type="text" class="form-control" value="{{old("grade",$personnel->grade)}}" name="grade">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="date_affectation">Date affectation</label>
                            <input type="text" class="form-control" value="{{old("date_affectation",$personnel->date_affectation)}}" name="date_affectation">
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
