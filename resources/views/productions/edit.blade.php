@extends('adminlte::page')

@section('content')


    <br>
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <div class="row">
        <div class="col-md-11 mx-auto">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Modifier une production</h3>
                </div>

                <form method="POST" action="{{ route('productions.update', $production->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{ $production->date }}">
                            </div>
                            <div class="col-md-4">
                                <label for="quart">Quart</label>
                                <select class="form-control" id="quart" name="quart">
                                    <option value="">Sélectionner un quart</option>
                                    @foreach($planning->pluck('quart')->unique() as $quart)
                                    <option value="{{ $quart }}" {{ $quart == $production->quart ? 'selected' : '' }}>{{ $quart }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="équipe">Équipe</label>
                                <select class="form-control" id="équipe" name="équipe">
                                    <option value="">Sélectionner une équipe</option>
                                    @foreach($planning->pluck('équipe')->unique() as $équipe)
                                    <option value="{{ $équipe }}" {{ $équipe == $production->équipe ? 'selected' : '' }}>{{ $équipe }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="atelier_id">Atelier</label>
                                <select class="form-control" id="atelier_id" name="atelier_id">
                                    <option value="">Sélectionner un atelier</option>
                                    @foreach($ateliers as $atelier)
                                    <option value="{{ $atelier->id }}" {{ $atelier->id == $production->atelier_id ? 'selected' : '' }}>{{ $atelier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="ligne_id">Ligne de production</label>
                                <select class="form-control" id="ligne_id" name="ligne_id">
                                    <option value="">Sélectionner une ligne</option>
                                    @foreach($lignes as $ligneId => $ligneName)
                                    <option value="{{ $ligneId }}" {{ $ligneId == $production->ligne_id ? 'selected' : '' }}>{{ $ligneName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="article_id">Article PF</label>
                                <select class="form-control" id="article_id" name="article_id">
                                    <option value="">Sélectionner un article</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="quantité_p">Quantité</label>
                                <input type="number" class="form-control" id="quantité_p" name="quantité_p" placeholder="quantité_p de la production" value="{{ $production->quantité_p }}">
                            </div>
                            <div class="col-md-4">
                                <label for="unité">Unité de production</label>
                                <input type="text" class="form-control" id="unité" name="unité" placeholder="Unité de production" value="{{ $production->unité }}">
                            </div>
                            <div class="col-md-4">
                                <label for="lot">Lot</label>
                                <input type="text" class="form-control" id="lot" name="lot" placeholder="Lot de la production" value="{{ $production->lot }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Modifier la production</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#atelier_id').change(function() {
            var atelierId = $(this).val();
            if (atelierId) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('getLines') }}",
                    data: {'atelier_id': atelierId},
                    dataType: "json",
                    success: function(res) {
                        if (res) {
                            $('#ligne_id').empty();
                            $('#ligne_id').append('<option value="">Sélectionner une ligne</option>');
                            $.each(res, function(key, value) {
                                $('#ligne_id').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        } else {
                            $('#ligne_id').empty();
                        }
                    }
                });
            } else {
                $('#ligne_id').empty();
            }
        });

        $('#ligne_id').change(function() {
            var ligneId = $(this).val();
            if (ligneId) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('getArticles') }}",
                    data: {'ligne_id': ligneId},
                    dataType: "json",
                    success: function(res) {
                        if (res) {
                            $('#article_id').empty();
                            $.each(res, function(key, value) {
                                $('#article_id').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        } else {
                            $('#article_id').empty();
                        }
                    }
                });
            } else {
                $('#article_id').empty();
            }
        });
    });
</script>

@endsection
