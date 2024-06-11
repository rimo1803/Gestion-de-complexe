@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <section class="table__header">
            <h1>Attestations</h1>
        </section>
        <section class="table__body">
            <table id="abs-table">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Description</th>
                        <th>Type attestation</th>
                        <th>Date edition</th>
                        <th>Reference</th>
                        <th>Matricule</th>
                        <th>Nom Complet</th>
                        <th>Email</th>
                        <th>Document</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attestations as $attestation)
                        <tr>
                            <td>{{$attestation->id}}</td>
                            <td>{{ $attestation->description }}</td>
                            <td>{{ $attestation->type_attestation }}</td>
                            <td>{{ $attestation->date_edition }}</td>
                            <td>{{ $attestation->reference }}</td>
                            <td>{{ $attestation->personnel->immat }}</td>
                            <td>{{ $attestation->personnel->Nomper }} {{ $attestation->personnel->prenomper }}</td>
                            <td>{{ $attestation->personnel->email }}</td>
                            <td>{{ $attestation->status }}</td>
                            <td>
                                @if($attestation->status == 'en_attente')
                                    @if($attestation->type_attestation == 'travail')
                                        <a href="{{route('attestation.travail',$attestation->id)}}">
                                            <ion-icon name="construct-outline" style="font-size: 30px; color: #5239ac;"></ion-icon>
                                        </a>
                                    @elseif($attestation->type_attestation == 'salaire')
                                      <a href="{{route('attestation.salaire',$attestation->id)}}">
                                            <ion-icon name="construct-outline" style="font-size: 30px; color: #5239ac;"></ion-icon>
                                       </a>
                                    @endif
                                @elseif($attestation->status == 'refuse')
                                    <ion-icon name="hand-left-outline" style="font-size: 30px; color: #aa4040;"></ion-icon>
                                @else
                                <a href="{{ route('attestations.download', $attestation->id) }}">
                                    <ion-icon name="print-outline" style="font-size: 30px; color: #4CAF50;"></ion-icon>
                                </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pag">
                {!! $attestations->links() !!}
            </div>
        </section>
@endsection

