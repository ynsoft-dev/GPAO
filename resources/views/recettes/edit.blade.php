@extends('adminlte::page')

@section('content')

    <br>
    <div class="row">
        <div class="col-md-9 mx-auto">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Modifier la recette</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('recettes.update', $recette->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="article_pf_id"><i class="fas fa-cube"></i> Article PF:</label>
                                    <select class="form-control" name="article_pf_id" id="article_pf_id" value="{{ $recette->article_pf_id }}">
                                        <option value="">Sélectionnez un article PF</option>
                                        @foreach($articlesPF as $article)
                                        <option value="{{ $article->id }}" {{ $article->id == $recette->article_pf_id ? 'selected' : '' }}>{{ $article->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <label for="article_ip_id">Article IP:</label>
                                    <select class="form-control" id="article_ip_id" name="article_ip_id">
                                        <option value="">Sélectionner un article IP</option>
                                        @foreach($articlesIP as $article)
                                            <option value="{{ $article->id }}" {{ $article->id == $recette->article_ip_id ? 'selected' : '' }}>{{ $article->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quantité"><i class="fas fa-balance-scale"></i> Quantité:</label>
                                    <input type="text" class="form-control" name="quantité" id="quantité" placeholder="Quantité" value="{{ $recette->quantité }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="unité"><i class="fas fa-boxes"></i> Unité:</label>
                                    <input type="text" class="form-control" name="unité" id="unité" placeholder="Unité" value="{{ $recette->unité }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
