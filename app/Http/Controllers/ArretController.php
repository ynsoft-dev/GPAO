<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Arret;

class ArretController extends Controller
{
    public function index()
    {
        
        $arrets = Arret::all();
        return view('arrets.index', compact('arrets'));
    }

   
    public function create()
    {
      
        return view('arrets.create');
    }

  
    public function store(Request $request, $productionId)
    {
   
        $validatedData = $request->validate([
            'duration' => 'required',
            'masqué' => 'required',
            'famille' => 'required',
            'sfamille' => 'required',
            'class' => 'required',
            'impact' => 'required',
            
        ]);
    
     
        $validatedData['production_id'] = $productionId;
        Arret::create($validatedData);
    
       
        return redirect()->back()->with('success', 'Arrêt déclaré avec succès.');
    }
   
    public function show($id)
    {
  
        $arret = Arret::findOrFail($id);
        return view('arrets.show', compact('arret'));
    }

 
    public function edit($id)
    {
        $arret = Arret::findOrFail($id);
        return view('arrets.edit', compact('arret'));
    }


    public function update(Request $request, $id)
    {
      
        $validatedData = $request->validate([
            'duration' => 'required',
            'masqué' => 'required',
            'famille' => 'required',
            'sfamille' => 'required',
            'class' => 'required',
            'impact' => 'required',
           
        ]);
        Arret::whereId($id)->update($validatedData);

        return redirect()->route('arrets.index')->with('success', 'Arrêt mis à jour avec succès.');
    }

  
    public function destroy(string $id)
    {
        try {
            $arret = Arret::findOrFail($id);
            $arret->delete();
            return redirect()->back()->with('success', 'Consommation supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de la suppression de la consommation.']);
        }
    }

}