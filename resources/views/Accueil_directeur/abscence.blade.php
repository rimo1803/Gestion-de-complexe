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
                                            <td>{{ $abscence->immat_per }}</td>
                                            <td class="d-flex justify-content-center align-items-center">
                                                <a href="" class="btn btn-sm mx-2" style="background-color:rgb(8, 252, 138)">
                                                <i class="bi bi-clipboard-check"></i>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
                                                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
                                                  </svg>


                                                </a>

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





















