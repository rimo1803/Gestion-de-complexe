@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
                <section class="attestation-section">
                    <div class="card">
                        <h1 class="card-header" style="color:rgb(60, 155, 88);"><strong>{{ $attestation->personnel->Nomper }} {{ $attestation->personnel->prenomper }}</strong></h1>
                        <div class="card-body">
                          <p><strong>Référence :</strong> {{ $attestation->reference }}</p>
                          <p><strong>Matricule :</strong> {{ $attestation->personnel->immat }}</p>
                          <p class="card-text"><strong>Description:</strong> {{ $attestation->description }}</p>
                          <p><strong>Position :</strong> {{ $attestation->travail->position }}</p>
                          <p><strong>Departement :</strong> {{ $attestation->travail->department }}</p>
                          <p><strong>Date de debut :</strong> {{ $attestation->travail->date_start }}</p>
                          <p><strong>Date de fin :</strong> {{ $attestation->travail->date_end }}</p>
                          <a href="{{route('generatePDFtravail',$attestation->id)}}" class="btn" style="background-color: rgb(44, 134, 79);color:white;">Generer attestation</a>
                          <a href="{{route('attestations.index')}}" class="btn" style="background-color: rgb(116, 106, 106);color:white;">Fermer</a>
                          <a href="{{route('attestation.refuse', $attestation->id)}}" class="btn" style="background-color: rgb(163, 50, 50);color:white;">Refuser</a>
                        </div>
                      </div>
                </section>
            </div>
        </div>
@endsection


