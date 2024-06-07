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
                                            <td>
                                                @if($abscence->type_abscence === 'justifiée')
                                                    <ion-icon name="checkmark-done-circle-outline" style="font-size: 30px; color: #4CAF50;"></ion-icon>
                                                @else
                                                <button type="button" class="btn" data-toggle="modal" data-target="#justifyModal{{ $abscence->id }}">
                                                    <ion-icon name="alert-outline" style="font-size: 30px; color: #F44336;" ></ion-icon>
                                                    Justifier
                                                </button>
                                                @endif

                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                    <div class="modal fade" id="justifyModal{{ $abscence->id }}" tabindex="-1" role="dialog" aria-labelledby="justifyModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="justifyModalLabel">Justification d'Abscence</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{ route('justifier', ['id' => $abscence->id]) }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="justification">Justification:</label>
                                                            <input type="file" class="form-control" id="justification" name="justification" accept="image/*, .pdf, .docx">
                                                        </div>
                                                        <button type="submit" class="ajt"  style="color: #dddeeb;">Soumettre</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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






















