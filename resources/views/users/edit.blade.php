@extends('adminlte::page')

@section('content')
    <br>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card card-default">
                <div class="card-header">Modifier <strong>{{ $user->name }}</strong></div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Associer rôle -->
                        @foreach($roles as $role)
                            <div class="form-group form-check">
                                <input 
                                    type="checkbox" 
                                    class="form-check-input" 
                                    name="roles[]" 
                                    value="{{ $role->id }}" 
                                    id="{{ $role->id }}"
                                    @foreach($user->roles as $userRole)
                                        @if($userRole->id == $role->id) checked @endif
                                    @endforeach
                                >
                                <label for="{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                            </div>
                        @endforeach

                        <!-- Champ Nom d'utilisateur -->
                        <div class="form-group">
                            <label for="name">Nom d'utilisateur</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <!-- Champ Adresse e-mail -->
                        <div class="form-group">
                            <label for="email">Adresse e-mail</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>

                        <!-- Champ Sélection d'équipe -->
                        <div class="form-group">
                            <label for="equipe">Équipe</label>
                            <select id="equipe" name="equipe" class="form-control">
                                <option value="A" {{ $user->equipe == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ $user->equipe == 'B' ? 'selected' : '' }}>B</option>
                                <option value="C" {{ $user->equipe == 'C' ? 'selected' : '' }}>C</option>
                            </select>
                        </div>

                        <!-- Bouton de soumission -->
                        <button type="submit" class="btn btn-dark">Enregistrer les modifications</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
