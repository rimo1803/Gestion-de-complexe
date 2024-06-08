<!-- create_attestation.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1 style="color: rgb(49, 106, 172);">Demande d'attestation</h1>
                    <form action="{{route('attestations.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="type">Type d'attestation :</label>
                            <select name="type" id="type" class="form-control">
                                <option value="travail">Attestation de travail</option>
                                <option value="salaire">Attestation de salaire</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                        </div>
                        <!-- Fields specific to salaire attestation -->
                        <div id="salaire_fields" style="display: none;">
                            <div class="form-group">
                                <label for="salary">Salaire :</label>
                                <input type="text" name="salary" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="currency">Devise :</label>
                                <input type="text" name="currency" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="salary_date">Date de salaire :</label>
                                <input type="date" name="salary_date" class="form-control">
                            </div>
                        </div>


                        <!-- Fields specific to travail attestation -->
                        <div id="travail_fields" style="display: none;">
                            <div class="form-group">
                                <label for="position">Position :</label>
                                <input type="text" name="position" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="department">Département :</label>
                                <input type="text" name="department" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="date_start">Date de début :</label>
                                <input type="date" name="date_start" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="date_end">Date de fin :</label>
                                <input type="date" name="date_end" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn ajt">Soumettre la demande</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Hide the specific fields initially
        document.getElementById('salaire_fields').style.display = 'none';
        document.getElementById('travail_fields').style.display = 'none';

        // Event listener for type selection
        document.getElementById('type').addEventListener('change', function() {
            var selectedType = this.value;

            // Hide all fields
            document.getElementById('salaire_fields').style.display = 'none';
            document.getElementById('travail_fields').style.display = 'none';

            // Show fields based on selected type
            if (selectedType === 'salaire') {
                document.getElementById('salaire_fields').style.display = 'block';
            } else if (selectedType === 'travail') {
                document.getElementById('travail_fields').style.display = 'block';
            }
        });
    </script>
@endsection
