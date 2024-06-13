@extends('adminlte::page')

@section('content')

    <br>
    <!-- Bouton "Ajouter un utilisateur" aligné à droite -->
    <div class="text-left mt-3">
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i> Créer un utilisateur
        </a>
    </div>
    
    <br> <!-- Ajout d'un espacement -->
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
                    <div class="card-header d-flex align-items-center">
                        <i class="fas fa-users mr-2"></i>
                        <h3 class="card-title">Liste des utilisateurs</h3>
                        <!-- /.card-tools -->
                    </div>
                </div>
                <div class="card-body">
                    @php
                        $heads = [
                            'Nom',
                            'Adresse email',
                            'Équipe',
                            'Roles',
                            'Actions'
                        ];
                    @endphp
                    <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable with-buttons>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->equipe }}</td>
                                <td>{{ implode(',', $user->roles->pluck('name')->toArray()) }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs btn-warning">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a type="button" class="btn btn-xs btn-danger delete-btn" title="Supprimer" data-toggle="modal" data-target="#deleteModal-{{ $user->id }}" data-user-id="{{ $user->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cet utilisateur ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <form id="deleteForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal d'erreur pour l'opérateur et le chef -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Erreur d'autorisation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Vous n'êtes pas autorisé à effectuer cette action.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');
        const deleteForm = document.getElementById('deleteForm');
        const isAdmin = "{{ auth()->user()->hasRole('admin') ? 'true' : 'false' }}";

        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                // Vérifier si l'utilisateur est un administrateur
                if (isAdmin === 'false') {
                    // Afficher le modal d'erreur
                    $('#errorModal').modal('show');
                    // Empêcher le comportement par défaut du bouton
                    event.preventDefault();
                } else {
                    // Si l'utilisateur est un administrateur, procéder à la suppression
                    event.preventDefault();
                    const userId = this.getAttribute('data-user-id');
                    deleteForm.action = "{{ route('users.destroy', '') }}" + '/' + userId;
                    $('#deleteModal').modal('show');
                }
            });
        });
    });
</script>

@endsection