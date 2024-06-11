@extends('layouts.main')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-calendar-times-o"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{ $absencesCount }}</h3>
                            <span>Absences</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-exclamation-circle"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{ $nonJustifiedAbscencesCount }}</h3>
                            <span>Absences Non-Justifiées</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-plane"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{ $missionsCount }}</h3>
                            <span>Missions</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-hourglass-half"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{ $congesCount }}</h3>
                            <span>Congés</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Attestations de Travail</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($workAttestations as $attestation)
                                <li class="list-group-item">
                                    {{ $attestation->description }}
                                    <a href="" class="btn btn_tele btn-sm float-right">Télécharger</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Attestations de Salaire</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($salaryAttestations as $attestation)
                                <li class="list-group-item">
                                    {{ $attestation->description }}
                                    <a href="" class="btn btn_tele btn-sm float-right">Télécharger</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
