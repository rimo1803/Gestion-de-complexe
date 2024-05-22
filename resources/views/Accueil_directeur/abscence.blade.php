@extends('layouts.master')
@section('content')
 <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row my-5">
                <div class="col-md-10 mx-auto">
                    <div class="card my-3">
                        <div class="card-header">
                            <h4 class="text-center">LISTE ABSCENCES</h4>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="table table-boredered table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Date de debut</th>
                                        <th>Date de fin</th>
                                        <th>Type de l'abscence</th>
                                        <th>La justification</th>
                                        <th>Date Affectaion</th>
                                        <th>Matricule</th>
                                        <th>Nom Complet</th>
                                        <th> Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($abscences as $key => $abscence)
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $abscence->date_debut }}</td>
                                            <td>{{ $abscence->date_fin }}</td>
                                            <td>{{ $abscence->type_abscence }}</td>
                                            <td>{{ $abscence->justification }}</td>
                                            <td>{{ $abscence->personnel->date_affectation}}</td>
                                            <td>{{ $abscence->personnel->immat}}</td>
                                            <td>{{ $abscence->personnel->Nomper}} {{ $abscence->personnel->prenomper}}</td>
                                            <td>
                                            @if ($abscence->type_abscence === 'true')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16" style="color: rgb(67, 231, 67)">
                                                    <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0"/>
                                                    <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708"/>
                                                  </svg></a>
                                             @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16" style="color: rgb(238, 21, 21)">
                                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"/>
                                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                                                </svg>
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



















@endsection





















