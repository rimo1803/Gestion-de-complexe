@extends('layouts.main')
@section('content')
 <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row my-5">
                <div class="col-md-10 mx-auto">
                    <div class="card my-3">
                        <div class="card-header">
                            <h4 class="text-center">MES ABSCENCES</h4>
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
                                                <a href="" class="btn btn-sm mx-2" style="background-color:rgb(0, 255, 136);color:white">
                                                    Valider
                                                </a>
                                                <a href="" class="btn btn-sm mx-2" style="background-color:rgb(224, 78, 41);color:white">
                                                    refuser
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





















