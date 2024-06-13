
@extends('adminlte::page')

@section('content')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)


    <br>
    <div class="row">
        <div class="col-md-11 mx-auto">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Détails de la production</h3>
                </div>
         
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Affichage des détails de la production -->
                    <table class="table">
                        <tbody>
                            @php
                                $details = [
                                    ['Date', $production->date],
                                    ['Quantité', $production->quantité_p],
                                    ['Unité de production', $production->unité],
                                    ['Lot', $production->lot],
                                    ['Atelier', $atelierName],
                                    ['Ligne', $ligneName],
                                    ['Quart', $production->quart],
                                    ['Équipe', $production->équipe],
                                    ['Article', $articleName],
                                    ['Temps total', $production->tt],
                                    ['Temps util', $production->tu],
                                    ['Rendement', $production->trs],
                              
                                ];

                               
                            @endphp

                            @foreach ($details as $index => $detail)
                                @if ($index % 3 == 0)
                                    <tr>
                                @endif
                                <th>{{ $detail[0] }}</th>
                                <td>{{ $detail[1] }}</td>
                                @if (($index + 1) % 3 == 0 || $index + 1 == count($details))
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Fin de l'affichage des détails -->

                    <!-- Onglets pour les arrêts et la consommation -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#arrets">Arrêts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#consommation_ip">Consommation IP</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content">
                        <div id="arrets" class="tab-pane fade show active">
                            <!-- Tableau pour afficher les arrêts -->
                            @php
                                $heads = [
                                    'Durée',
                                    'Masqué',
                                    'Famille',
                                    'Sous-famille',
                                    'Actions',
                                ];
                            @endphp
                            <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable with-buttons> 
                                @foreach ($arrets as $arret)
                                    <tr>
                                        <td>{{ $arret->duration }} Minute(s) </td>
                                        <td>{{ $arret->masqué ? 'Oui' : 'Non' }}</td>
                                        <td>{{ $arret->famille }}</td>
                                        <td>{{ $arret->sfamille }}</td>
                                        <td>
                                            <button class="btn btn-xs btn-warning edit-btn" data-toggle="modal" data-target="#editModal{{ $arret->id }}"><i class="fas fa-pencil-alt"></i></button>
                                            <button class="btn btn-xs btn-danger delete-btn" data-id="{{ $arret->id }}" data-toggle="modal" data-target="#confirmDeleteModal{{ $arret->id }}"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editModal{{ $arret->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Modifier l'arrêt</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Formulaire pour modifier l'arrêt -->
                                                    <form action="{{ route('productions.updateArret', ['id' => $arret->id]) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <!-- Champs de formulaire pour la modification -->
                                                        <div class="form-group">
                                                            <label for="duration">Durée de l'arrêt :</label>
                                                            <input type="text" name="duration" id="duration" class="form-control" value="{{ $arret->duration }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="masque">Masqué :</label>
                                                            <select name="masqué" id="masque" class="form-control">
                                                                <option value="0" {{ $arret->masqué == 0 ? 'selected' : '' }}>Non</option>
                                                                <option value="1" {{ $arret->masqué == 1 ? 'selected' : '' }}>Oui</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="famille">Famille :</label>
                                                            <select name="famille" id="famille" class="form-control">
                                                                @php
                                                                    $uniqueFamilies = [];
                                                                @endphp
                                                                @foreach($catalogs as $catalog)
                                                                    @if (!in_array($catalog->famille, $uniqueFamilies))
                                                                        <option value="{{ $catalog->famille }}">{{ $catalog->famille }}</option>
                                                                        @php
                                                                            // Ajouter la famille à la liste des familles uniques
                                                                            $uniqueFamilies[] = $catalog->famille;
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                    
                                                        <div class="form-group">
                                                            <label for="sfamille">Sous-famille :</label>
                                                            <select name="sfamille" id="sfamille" class="form-control">
                                                                @foreach($catalogs as $catalog)
                                                                    <option value="{{ $catalog->sfamille }}" data-family="{{ $catalog->famille }}" data-class="{{ $catalog->class }}" data-impact="{{ $catalog->impact }}">{{ $catalog->sfamille }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                    
                                                        <!-- Bouton pour soumettre le formulaire -->
                                                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal pour la confirmation de suppression -->
                                    <div class="modal fade" id="confirmDeleteModal{{ $arret->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmation de suppression</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Êtes-vous sûr de vouloir supprimer cet arrêt ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                    <form action="{{ route('productions.destroyArret', ['id' => $arret->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </x-adminlte-datatable>                      <!-- Bouton pour ouvrir le modal des arrêts -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalArrets">Ajouter un arrêt</button>
                        </div>
                        
                        
                        <div id="consommation_ip" class="tab-pane fade">
                            @php
                                $heads = [
                                    'Article IP',
                                    'Quantité unitaire',
                                    'Quantité consommé',
                                    'Unité',
                                    
                                ];
                            @endphp
                            <x-adminlte-datatable id="table2" :heads="$heads" striped hoverable with-buttons> 
                                @foreach ($recettes as $recette)
                                    <tr>
                                        
                                     <td> {{ $recette->article_ip->name }}</td>
                                     <td>{{ $recette->quantité }}</td>
                                     <td>{{ $recette->quantité * $production->quantité_p }}</td>
                                     <td>{{ $recette->unité}}</td>
                                    </tr>
                                @endforeach
                            </x-adminlte-datatable>
                        </div>
                    </div>
                    <!-- Fin du contenu des onglets -->
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal pour les arrêts -->
<div class="modal fade" id="modalArrets" tabindex="-1" role="dialog" aria-labelledby="modalArretsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalArretsLabel">Ajouter un arrêt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulaire pour déclarer un arrêt -->
                <form id="declarationArretForm" action="{{ route('production.store', ['production' => $production->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="duration">Durée de l'arrêt :</label>
                        <input type="text" name="duration" id="duration" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="masqué">Masqué :</label>
                        <select name="masqué" id="masqué" class="form-control">
                            <option value="0">Non</option>
                            <option value="1">Oui</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="famille">Famille :</label>
                        <select name="famille" id="famille" class="form-control">
                            @php
                                $uniqueFamilies = [];
                            @endphp
                            @foreach($catalogs as $catalog)
                                @if (!in_array($catalog->famille, $uniqueFamilies))
                                    <option value="{{ $catalog->famille }}">{{ $catalog->famille }}</option>
                                    @php
                                        // Ajouter la famille à la liste des familles uniques
                                        $uniqueFamilies[] = $catalog->famille;
                                    @endphp
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sfamille">Sous-famille :</label>
                        <select name="sfamille" id="sfamille" class="form-control">
                            @foreach($catalogs as $catalog)
                                <option value="{{ $catalog->sfamille }}" data-family="{{ $catalog->famille }}" data-class="{{ $catalog->class }}" data-impact="{{ $catalog->impact }}">{{ $catalog->sfamille }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="class">Classe :</label>
                        <select name="class" id="class" class="form-control">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="impact">Impact :</label>
                        <select name="impact" id="impact" class="form-control">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="production_id">ID de la production :</label>
                        <input type="text" name="production_id" id="production_id" value="{{ $production->id }}" class="form-control" readonly>
                    </div>

                    

                    <button type="submit" class="btn btn-primary">Déclarer Arrêt</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Ajoutez cette section de script dans votre code -->
<script>
    // Fonction pour mettre à jour les options de sous-famille en fonction de la famille sélectionnée
    function updateSubFamilies() {
        // Récupérer la valeur sélectionnée de la famille
        var selectedFamily = document.getElementById("famille").value;
        
        // Sélectionner le champ de sélection de sous-famille
        var subFamilySelect = document.getElementById("sfamille");
        
        // Parcourir toutes les options de sous-famille
        for (var i = 0; i < subFamilySelect.options.length; i++) {
            var option = subFamilySelect.options[i];
            // Vérifier si l'option fait partie de la famille sélectionnée
            if (option.getAttribute("data-family") === selectedFamily || selectedFamily === "") {
                // Afficher l'option si elle correspond à la famille sélectionnée ou si aucune famille n'est sélectionnée
                option.style.display = "";
            } else {
                // Cacher l'option si elle ne correspond pas à la famille sélectionnée
                option.style.display = "none";
            }
        }
    }
    
    // Ajouter un écouteur d'événements onchange au champ de sélection de la famille
    document.getElementById("famille").addEventListener("change", updateSubFamilies);
    
    // Appeler la fonction pour mettre à jour les options de sous-famille au chargement de la page
    updateSubFamilies();

    // Fonction pour mettre à jour les options de classe et d'impact en fonction de la sous-famille sélectionnée
    function updateClassAndImpact() {
        // Récupérer la valeur sélectionnée de la sous-famille
        var selectedSubFamily = document.getElementById("sfamille").value;
        
        // Sélectionner le champ de sélection de classe
        var classSelect = document.getElementById("class");
        
        // Effacer les options existantes
        classSelect.innerHTML = "";
        
        // Parcourir toutes les options de classe
        @foreach($catalogs as $catalog)
            if ("{{ $catalog->sfamille }}" === selectedSubFamily) {
                var option = document.createElement("option");
                option.value = "{{ $catalog->class }}";
                option.text = "{{ $catalog->class }}";
                classSelect.add(option);
            }
        @endforeach
        // Sélectionner le champ de sélection de impact
        var impactSelect = document.getElementById("impact");
        
        // Effacer les options existantes
        impactSelect.innerHTML = "";
        
        // Parcourir toutes les options impact
        @foreach($catalogs as $catalog)
            if ("{{ $catalog->sfamille }}" === selectedSubFamily) {
                var option = document.createElement("option");
                option.value = "{{ $catalog->impact }}";
                option.text = "{{ $catalog->impact }}";
                impactSelect.add(option);
            }
        @endforeach
    }
    
    // Ajouter un écouteur d'événements onchange au champ de sélection de la sous-famille
    document.getElementById("sfamille").addEventListener("change", updateClassAndImpact);
    
    // Appeler la fonction pour mettre à jour les options de classe et d'impact au chargement de la page
    updateClassAndImpact();
</script>
<script>
    // Fonction pour afficher le contenu de l'onglet actif et masquer les autres
    function showTabContent(tabId) {
        // Récupérer tous les conteneurs d'onglets
        var tabContents = document.querySelectorAll('.tab-content .tab-pane');
        
        // Parcourir chaque conteneur d'onglet
        tabContents.forEach(function(tabContent) {
            // Masquer tous les conteneurs d'onglets
            tabContent.style.display = 'none';
        });
        
        // Afficher le conteneur de l'onglet actif
        document.getElementById(tabId).style.display = 'block';
    }
    
    // Ajouter un écouteur d'événements pour chaque onglet
    document.querySelectorAll('.nav-tabs .nav-link').forEach(function(tab) {
        tab.addEventListener('click', function(event) {
            // Récupérer l'ID de l'onglet correspondant au lien cliqué
            var tabId = event.target.getAttribute('href').replace('#', '');
            
            // Afficher le contenu de l'onglet actif et masquer les autres
            showTabContent(tabId);
        });
    });
    
    // Afficher le contenu du premier onglet au chargement de la page
    showTabContent('arrets');



    
    document.getElementById("articleIPSelect").addEventListener("change", function() {
        var selectedArticleId = this.value;
        var recetteRows = document.querySelectorAll("#consommation_ip table tbody tr");

        // Parcourir les lignes de la table des recettes
        recetteRows.forEach(function(row) {
            var articleId = row.getAttribute("data-article-id");
            if (selectedArticleId === "all" || selectedArticleId === articleId) {
                row.style.display = ""; // Afficher la ligne si elle correspond à l'article sélectionné ou si "Tous les articles" est sélectionné
            } else {
                row.style.display = "none"; // Masquer la ligne sinon
            }
        });
    });


</script>

@endsection