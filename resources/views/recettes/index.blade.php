@extends('adminlte::page')

@section('content')

    <br>

    <div class="text- mt-3">
        <a href="{{ route('recettes.create') }}" class="btn btn-primary">
            <i class="fas fa-cube mr-1"></i> Ajouter recette
        </a>
    </div>
    @section('plugins.Datatables', true)
    @section('plugins.DatatablesPlugin', true)


    {{-- Votre contenu ici --}}
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
                    <h3 class="card-title">Liste des recettes</h3>
                </div>

                <!-- /.card-header -->
                
                <div class="card-body">
                    @php
                    $heads = [
                        'Code',
                        'Article PF',
                        'Article IP',
                        'Quantité',
                        'Unité',
                        'Actions',
                    ];
                    @endphp
                    
                    <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable with-buttons> 
                        
                            @foreach($recettes as $recette)
                                <tr>
                                <td>{{ $recette->code }}</td>
                                    <td>
                                        @if($recette->article_pf)
                                            {{ $recette->article_pf->name }}
                                        @else
                                            Aucun article trouvé
                                        @endif
                                    </td>
                                    <td>
                                        @if($recette->article_ip)
                                            {{ $recette->article_ip->name }}
                                        @else
                                            Aucun article trouvé
                                        @endif
                                    </td>
                                    <td>{{ $recette->quantité }}</td>
                                    <td>{{ $recette->unité }}</td>
                                    <td>
                                    <a href="{{ route('recettes.edit', $recette->id) }}" type="button" class="btn btn-xs btn-warning mr-1" title="Modifier">
    <i class="fas fa-pencil-alt"></i>
</a>

                                        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal{{ $recette->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    </div>
</div>


@foreach($recettes as $recette)
    <!-- Modal de confirmation de suppression -->
    <div class="modal fade" id="deleteModal{{ $recette->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $recette->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $recette->id }}">Confirmation de suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer cette recette ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <form action="{{ route('recettes.destroy', $recette->id) }}" method="POST">
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