@extends('layouts.main')
@section('content')
 <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row my-5">
                <div class="col-md-10 mx-auto">
                    <div class="card my-3">
                        <div class="card-header">
                            <h1 class="text-center" style="color: rgb(49, 106, 172);">Mes Attestations</h1>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="table table-boredered table-striped">
                                <thead>
                                    <tr>
                                        <tr>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Date d'édition</th>
                                            <th>Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @foreach($attestations as $attestation)
                                    <tr>
                                        <td>{{ $attestation->type_attestation }}</td>
                                        <td>{{ $attestation->description }}</td>
                                        <td>{{ $attestation->date_edition }}</td>
                                        <td>
                                            <a href="{{ route('attestations.download', $attestation->id) }}" class="btn ajt">Télécharger</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('attestations.create') }}" class="btn btn-success">Demander une Attestation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
