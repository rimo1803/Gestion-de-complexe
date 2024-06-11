@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row my-5">
            <div class="col-md-10 mx-auto">
                <div class="card my-3">
                    <div class="card-header">
                        <h4 class="text-center">MES MISSIONS</h4>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-boredered table-striped">
        <ul class="list-group">
            @foreach ($missions as $mission)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $mission->destination }}
                    <div class="btn-group" role="group" aria-label="Actions">
                        <a href="{{ route('missions.fillTransportForm', $mission->id) }}" class="btn " style="background-color: rgb(127, 201, 127)">
                            <i class="fas fa-truck"></i> Transport
                        </a>
                        <a href="{{ route('missions.downloadMissionOrder', $mission->id) }}" class="btn " style="background-color: green">
                            <i class="fas fa-download"></i> Ordre de mission
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
                        </table>
    </div>
@endsection


