
@extends('adminlte::page')

@section('content')

    <br>

    <div class="text- mt-3">
        <a href="{{ route('productions.create') }}" class="btn btn-primary">
            <i class="fas fa-cube mr-1"></i> Ajouter production
        </a>
    </div>
    @section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

    <br>
    @if (session()->has('add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('add') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


@if (session()->has('edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('edit') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('delete') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Productions</h3>
                </div>

                <!-- /.card-header -->
                
                <div class="card-body">
                    @php
                    $heads = [
                    'Code',
                    'Date', 
                    'Quantité',
                    'Unité',
                    'Temps total',
                    'Rendement',
                    'Actions',
                    ];
                    @endphp
                    
                    <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable with-buttons> 
                   
                        
                        @foreach ($productions as $production)
                        <tr>
                            <td>{{ $production->code }}</td>
                            <td>{{ $production->date }}</td>
                            <td>{{ $production->quantité_p }}</td>
                            <td>{{ $production->unité }}</td>
                            <td>{{ $production->tt}} Heure(s)</td>
                            <td>{{ $production->trs}}%</td>

                           
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('productions.show', $production->id) }}" class="text-info px-1" title="Voir détails">
                                        <button type="button" class="btn btn-xs btn-success" title="Voir détails">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="{{ route('productions.edit', $production->id) }}" type="button" class="btn btn-xs btn-warning mr-1" title="Modifier">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a type="button" class="btn btn-xs btn-danger" title="Supprimer" data-toggle="modal"
                                        data-target="#deleteModal-{{ $production->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>  
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </x-adminlte-datatable>
                   
                    <div class="d-flex justify-content-center mt-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>



<!-- Modal de confirmation de suppression -->
@foreach ($productions as $production)
<div class="modal fade" id="deleteModal-{{ $production->id }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cette production ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <form id="deleteForm" action="{{ route('productions.destroy', $production->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection
