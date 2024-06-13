<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Production;
use App\Models\Recette;
use App\Models\ConsommationIp;
use App\Models\Article;

class RecetteController extends Controller
{
  
    public function index()
    {
      
       
        $articlesPF = Article::where('type', 'PF')->get();
        $articlesIP = Article::where('type', 'IP')->get();
      
        $recettes = Recette::all();
         
        return view('recettes.index', compact('recettes','articlesPF', 'articlesIP'));
    }
    public function create()
    {
        $articlesPF = Article::where('type', 'PF')->get();
        $articlesIP = Article::where('type', 'IP')->get();
      
        $recettes = Recette::all();
         
        return view('recettes.create', compact('recettes','articlesPF', 'articlesIP'));
    }

    
 
    public function store(Request $request)
{
   
    $request->validate([
        'article_pf_id' => 'required|exists:articles,id', 
        'article_ip_id' => 'required|exists:articles,id',
        'quantité' => 'required',
        'unité' => 'required',
    ]);

    $recette = new Recette();

    $recette->article_pf_id = $request->input('article_pf_id');
    $recette->article_ip_id = $request->input('article_ip_id'); 
    $recette->quantité = $request->input('quantité');
    $recette->unité= $request->input('unité');
    
    
    if ($recette->save()) {
        
        return redirect()->route('recettes.index')->with('add', 'Recette créée avec succès.');
    } 
}
public function edit($id)
{
    $articlesPF = Article::where('type', 'PF')->get();
    $articlesIP = Article::where('type', 'IP')->get();
    $recette = Recette::findOrFail($id); 
    return view('recettes.edit', compact('recette','articlesPF', 'articlesIP'));
}



public function update(Request $request, $id)
{
  
    $request->validate([
        'article_pf_id' => 'required|exists:articles,id',
        'article_ip_id' => 'required|exists:articles,id',
        'quantité' => 'required',
        'unité' => 'required',
    ]);

  
    $recette = Recette::findOrFail($id);

   
    $recette->article_pf_id = $request->input('article_pf_id');
    $recette->article_ip_id = $request->input('article_ip_id'); 
    $recette->quantité = $request->input('quantité');
    $recette->unité = $request->input('unité');
    if ($recette->save()) {
        
        return redirect()->route('recettes.index')->with('edit', 'Recette modifée avec succès.');
    } 
}

    public function destroy($id)
    {
        Recette::findOrFail($id)->delete();
        return redirect()->route('recettes.index')->with('delete', 'La recette a été supprimé avec succès.');
    }
}
