@extends('adminlte::page')

@section('content')

    <br>
    <div class="row">
    <div class="col-md-10 mx-auto">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Créer un utilisateur</h3>
                </div>
                <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <x-adminlte-input name="name" label="Nom d'utilisateur" placeholder="Nom d'utilisateur" label-class="text-dark">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-dark"></i>
                                </div>
                            </x-slot>
                            <input type="text" class="form-control form-control-lg" name="username" placeholder="Nom d'utilisateur">
                        </x-adminlte-input>

                        <x-adminlte-input name="email" type="email" label="Adresse e-mail" placeholder="Adresse e-mail de l'utilisateur" label-class="text-dark">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope text-dark"></i>
                                </div>
                            </x-slot>
                            <input type="email" class="form-control form-control-lg" name="email" placeholder="Adresse e-mail de l'utilisateur">
                        </x-adminlte-input>

                        <x-adminlte-input name="password" type="password" label="Mot de passe" placeholder="Mot de passe de l'utilisateur" label-class="text-dark">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-lock text-dark"></i>
                                </div>
                            </x-slot>
                            <input type="password" class="form-control form-control-lg" name="password" placeholder="Mot de passe de l'utilisateur">
                        </x-adminlte-input>
                        <x-adminlte-select name="role" label="Rôle" label-class="text-dark">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user-tag text-dark"></i>
                                </div>
                            </x-slot>
                            <option value="">Sélectionnez un rôle</option>
                            <option value="admin">Administrateur</option>
                            <option value="responsable">Responsable</option>
                            <option value="operateur">Opérateur</option>
                        </x-adminlte-select>
                        <x-adminlte-input type="hidden" name="model_type" value="{{ App\Models\User::class }}" />

                        <x-adminlte-select name="equipe" label="Équipe" label-class="text-dark">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-users text-dark"></i>
                                </div>
                            </x-slot>
                            <option value="">Sélectionnez une équipe</option>
                            <option value="A">Équipe A</option>
                            <option value="B">Équipe B</option>
                            <option value="C">Équipe C</option>
                        </x-adminlte-select>
                        
                    </div>

                    <div class="card-footer">
                        <button type="submit" id="addUserButton" class="btn btn-primary">Ajouter un utilisateur</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="restrictionModal" tabindex="-1" role="dialog" aria-labelledby="restrictionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="restrictionModalLabel">Restriction d'accès</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Vous n'êtes pas autorisé à ajouter un utilisateur.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('addUserButton').addEventListener('click', function () {
            @if(!auth()->user()->hasRole('admin'))
                $('#restrictionModal').modal('show');
                event.preventDefault();
            @endif
        });
    });
</script>
@endsection