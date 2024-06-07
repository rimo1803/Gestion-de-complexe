@extends('layouts.main')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row my-5">
            <div class="col-md-10 mx-auto">
                <div class="card my-3">
                    <div class="card-header">
                        <h4 class="text-center">Justification d'Abscence</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('justify', ['id' => $abscence->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="justification">Justification:</label>
                                <input type="file" class="form-control" id="justification" name="justification" accept="image/*, .pdf, .docx">
                            </div>
                            <button type="submit" class="btn btn-primary">Soumettre</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
