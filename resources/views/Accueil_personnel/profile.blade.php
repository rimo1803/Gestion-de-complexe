@extends('layouts.mainuser')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md8 mx-auto">
                <div class="card my-5">
                    <div class="card-header bg-white text-center p-3">
                        <h3 class="text-dark">{{$personnel->Nomper}} {{$personnel->prenomper}}</h3>
                    </div>
                    <div class="card-body">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="matricule">Matricule</label>
                                <input type="text" disabled name="matricule" value="{{$personnel->immat}}"  class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="fullname" class="form-label fw-bold">Full Name</label>
                                <input type="text" disabled name="fullname" value="{{$personnel->Nomper}} {{$personnel->prenomper}}" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="cin">CIN</label>
                                <input type="text" disabled class="form-control" value="{{$personnel->CIN}}"  name="cin">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="dateaffe">Date d'affectaion</label>
                                <input type="date" disabled class="form-control" value="{{$personnel->date_affectation}}" name="dateaffe">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="dtna">Date de Naissance</label>
                                <input type="date" disabled class="form-control" value="{{$personnel->date_naissance}}" name="dtna">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="lieu">Lieu de Naissance</label>
                                <input type="text" disabled class="form-control" value="{{$personnel->lieu_naissance}}" name="lieu">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold" for="gr">Grade</label>
                                <input type="text" disabled class="form-control" value="{{$personnel->grade}}" name="gr">
                            </div>
             
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
