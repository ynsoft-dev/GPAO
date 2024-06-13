<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Atelier;
use App\Models\Ligne;
use App\Models\Article;
use App\Models\Catalog;
use App\Models\Recette;
use App\Models\Production;
use App\Models\Cadence;
use App\Models\Arret;
use App\Models\ConsommationIp;
use App\Models\Planning;

class ProductionController extends Controller
{
    public function index()
    {
        // Récupérer toutes les productions
        $productions = Production::all();
    
        // Récupérer les données de Cadence pour chaque production
        foreach ($productions as $production) {
            // Récupérer la cadence correspondante
            $cadence = Cadence::where('article_id', $production->article_id)
                ->where('atelier_id', $production->atelier_id)
                ->where('ligne_id', $production->ligne_id)
                ->first();
    
            // Vérifier si une cadence correspondante a été trouvée
            if ($cadence) {
                // Assigner les détails de la cadence à la production
                $production->article = $cadence->article;
                $production->atelier = $cadence->atelier;
                $production->ligne = $cadence->ligne;
            } else {
                // Si aucune cadence correspondante n'est trouvée, attribuer des valeurs par défaut à la production
                $production->article = null;
                $production->atelier = null;
                $production->ligne = null;
            }
        }
    
        // Récupérer toutes les consommations IP
        $consommations_ip = ConsommationIp::all();
    
        // Récupérer tous les ateliers
        $ateliers = Atelier::all();
    
        // Récupérer la liste des lignes de la dernière cadence
        $lignes = Cadence::with('ligne')->get()->pluck('ligne.name', 'ligne_id')->toArray();
    
        // Récupérer l'utilisateur authentifié
        $user = auth()->user();
    
        // Retourner la vue avec les données récupérées
        return view('productions.index', compact('productions', 'user', 'ateliers', 'lignes', 'consommations_ip'));
    }
    

    public function create()
{
    $user = auth()->user();
    
    // Récupérer toutes les planifications
    $plannings = Planning::all();
    
    // Initialiser des tableaux pour stocker les ateliers et les lignes
    $ateliers = [];
    $lignes = [];

    // Parcourir toutes les planifications pour récupérer les ateliers et les lignes associés
    foreach ($plannings as $planning) {
        $atelier = $planning->atelier;
        
        if ($atelier) {
            // Ajouter l'atelier au tableau des ateliers
            $ateliers[$atelier->id] = $atelier->name;

            // Récupérer les lignes de production disponibles à partir des cadences de la planification courante
            $ligneIds = Cadence::where('atelier_id', $atelier->id)->pluck('ligne_id');
            $lignes += Ligne::whereIn('id', $ligneIds)->pluck('name', 'id')->toArray();
        }
    }

    // Passer les données à la vue de création de production
    return view('productions.create', compact('user', 'plannings', 'ateliers', 'lignes'));
}

    

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'quart' => 'required',
            'équipe' => 'required',
            'ligne_id' => 'required',
            'atelier_id' => 'required',
            'quantité_p' => 'required',
            'unité' => 'required',
            'lot' => 'required',
        ]);
    
        // Récupérer l'article en fonction de l'ID de la ligne sélectionnée
        $ligneId = $request->input('ligne_id');
        $cadence = Cadence::where('ligne_id', $ligneId)->firstOrFail();
        $articleId = $cadence->article_id;
    
        // Créer une nouvelle production avec les données du formulaire
        $production = new Production();
        $production->date = $request->input('date');
        $production->quart = $request->input('quart');
        $production->équipe = $request->input('équipe');
        $production->atelier_id = $request->input('atelier_id');
        $production->ligne_id = $request->input('ligne_id');
        $production->article_id = $articleId; // Utilisation de l'article récupéré
        $production->quantité_p = $request->input('quantité_p');
        $production->unité = $request->input('unité');
        $production->lot = $request->input('lot');
        $production->save();
    
        // Vérifiez si des arrêts ont été fournis dans la requête
        if ($request->has('duration')) {
            // Créez un nouvel arrêt
            $arret = new Arret();
            $arret->duration = $request->input('duration');
            $arret->masqué = $request->input('masqué');
            $arret->famille = $request->input('famille');
            $arret->sfamille = $request->input('sfamille');
            $arret->production_id = $production->id;
            $arret->catalog_id = $request->input('catalog_id');
            $arret->save();
        }
    
        return redirect()->route('productions.index')->with('add', 'Production créée avec succès.');
    }
    
    public function edit($id)
    {
        // Récupérer les données de la dernière cadence
        $cadence = Cadence::latest()->first();
        // Récupérer les données du dernier planning
        $planning = Planning::latest()->first();

        // Récupérer la liste des quarts de travail uniques
        $quarts = Planning::pluck('quart')->unique()->toArray();
        // Récupérer la production à mettre à jour
        $production = Production::findOrFail($id);
        $ateliers = Atelier::all();

        // Récupérer la liste des lignes de la dernière cadence
        $lignes = Cadence::with('ligne')->get()->pluck('ligne.name', 'ligne_id')->toArray();
        return view('productions.edit', compact('production', 'cadence', 'planning', 'quarts', 'ateliers', 'lignes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'quart' => 'required',
            'équipe' => 'required',
            'ligne_id' => 'required',
            'atelier_id' => 'required',
            'quantité_p' => 'required',
            'unité' => 'required',
            'lot' => 'required',
        ]);

        // Récupérer l'article en fonction de l'ID de la ligne sélectionnée
        $ligneId = $request->input('ligne_id');
        $cadence = Cadence::where('ligne_id', $ligneId)->firstOrFail();
        $articleId = $cadence->article_id;

        $production = Production::findOrFail($id);

        // Mettre à jour les données de production avec celles du formulaire
        $production->date = $request->input('date');
        $production->quart = $request->input('quart');
        $production->équipe = $request->input('équipe');
        $production->atelier_id = $request->input('atelier_id');
        $production->ligne_id = $request->input('ligne_id');
        $production->article_id = $articleId; // Utilisation de l'article récupéré
        $production->quantité_p = $request->input('quantité_p');
        $production->unité = $request->input('unité');
        $production->lot = $request->input('lot');
        $production->save();

        // Rediriger avec un message de succès
        return redirect()->route('productions.index')->with('edit', 'Production mise à jour avec succès.');
    }

    public function destroy($id)
    {
        Production::findOrFail($id)->delete();
        return redirect()->route('productions.index')->with('delete', 'La production a été supprimée avec succès.');
    }

   public function show($id)
{
    // Récupérer la production en cours
    $production = Production::findOrFail($id);

    // Récupérer les données de cadence pour la production
    $cadence = Cadence::where('article_id', $production->article_id)
        ->where('atelier_id', $production->atelier_id)
        ->where('ligne_id', $production->ligne_id)
        ->first();

    // Vérifier si une cadence correspondante a été trouvée
    if ($cadence) {
        $ligneName = $cadence->ligne->name;
        $atelierName = $cadence->atelier->name;
        $articleName = $cadence->article->name;
    } else {
        // Si aucune cadence correspondante n'est trouvée, attribuez des valeurs par défaut
        $ligneName = "Ligne inconnue";
        $atelierName = "Atelier inconnu";
        $articleName = "Article inconnu";
    }

    // Autres données que vous souhaitez passer à la vue
    $catalogs = Catalog::all();
    $arrets = $production->arrets ?? [];
    $recettes = Recette::where('article_pf_id', $production->article_id)->get();

    // Passer les données à la vue
    return view('productions.show', compact('production', 'ligneName', 'atelierName', 'articleName', 'arrets', 'catalogs', 'recettes'));
}


    public function getLines(Request $request)
    {
        $atelierId = $request->input('atelier_id');

        // Récupérer les IDs des lignes associées aux cadences dans l'atelier donné
        $lineIds = Cadence::whereHas('ligne', function ($query) use ($atelierId) {
            $query->where('atelier_id', $atelierId);
        })->pluck('ligne_id');

        // Récupérer les lignes associées à ces IDs
        $lines = Ligne::whereIn('id', $lineIds)->pluck('name', 'id')->toArray();

        return response()->json($lines);
    }

    public function getArticles(Request $request)
    {
        $ligneId = $request->input('ligne_id');
        $cadences = Cadence::where('ligne_id', $ligneId)->get();
        $articles = $cadences->pluck('article.name', 'article_id')->toArray();
        return response()->json($articles);
    }

    public function updateArret(Request $request, $id)
    {
        $validatedData = $request->validate([
            'duration' => 'required',
            'masqué' => 'required',
            'famille' => 'required',
            'sfamille' => 'required',
        ]);

        $arret = Arret::findOrFail($id);
        $arret->update($validatedData);

        return redirect()->back()->with('success', 'Arrêt mis à jour avec succès.');
    }

    public function destroyArret($id)
    {
        $arret = Arret::findOrFail($id);
        $arret->delete();
        return redirect()->back()->with('success', 'Arrêt supprimé avec succès.');
    }

    public function rapport(Request $request)
    {
        $productions = Production::query();

        if ($request->has('start_date') && $request->has('end_date')) {
            $productions->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        $productions = $productions->get();

        return view('rapport', compact('productions'));
    }
}
