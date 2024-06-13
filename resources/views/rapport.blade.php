
@extends('adminlte::page')

@section('title', 'Rapport de Production')

@section('content_header')
    <h1>Rapport de Production</h1>
@stop

@section('content')

    <br>
    <div class="row mb-3">
        <div class="col-md-12 mx-auto">
            <form action="{{ route('rapport') }}" method="GET" class="form-inline d-print-none">
                <div class="form-group mr-2">
                    <label for="start_date" class="mr-2">Date de début</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                </div>
                <div class="form-group mr-2">
                    <label for="end_date" class="mr-2">Date de fin</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Filtrer</button>
            </form>
        </div>
    </div>

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Rapport de Production</h3>
        </div>

        <div class="card-body">
            <div class="report p-3 mb-3">
                <div class="row">
                    <div class="col-12">
                        <h4 class="d-flex align-items-center">
                            <img src="{{ asset('images/cevital.png') }}" alt="Cevital Logo" style="max-width: 50px; margin-right: 10px;">
                            <span>Cevital Agro-Industrie</span>
                            <small class="float-right d-print-none" style="margin-left: auto;">Date: {{ date('d/m/Y') }}</small>
                        </h4>
                    </div>
                </div>

                <div class="row report-info">
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <strong>Cevital Bejaia</strong><br>
                                Agro-alimentaire<br>
                                Adresse : Rte Arrière Port<br>
                                Béjaïa<br>
                                Téléphone : 034 10 38 38<br>
                                Email: info@cevital.com
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <p>Utilisateur: {{ Auth::user()->name }}</p>
                                <p>Date de génération: {{ date('d/m/Y H:i:s') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Date de Production</th>
                                    <th>Article PF</th>
                                    <th>Temps Total</th>
                                    <th>Rendement</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($productions->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center">Aucune production trouvée pour la période spécifiée.</td>
                                    </tr>
                                @else
                                    @foreach ($productions as $production)
                                    <tr>
                                        <td>{{ $production->date }}</td>
                                        <td>{{ $production->cadence->article->name }}</td>

                                        <td>{{ $production->tt }} heure(s)</td>
                                        <td>{{ $production->trs }}%</td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row no-print">
                    <div class="col-12 d-print-none">
                        <button type="button" class="btn btn-default" onclick="window.print();"><i class="fas fa-print"></i> Imprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            .report, .report * {
                visibility: visible;
            }
            .report {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            .d-print-none {
                display: none !important;
            }
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop