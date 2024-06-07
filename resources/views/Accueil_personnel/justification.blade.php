@extends('layouts.main')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Justification de l'absence</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="absence_id" value="{{ $id }}">
                                <div class="form-group">
                                    <label for="justification">Justification:</label>
                                    <input type="file" class="form-control-file" id="justification" name="justification">
                                </div>
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
