<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cadence; 
use App\Models\Ligne;
use App\Models\Atelier;
use App\Models\Article;

class CadenceComponent extends Component
{
    public $data, $selected_id, $cadence, $unité, $atelier_id, $ligne_id, $article_id;
    public $updateMode = false;

    public function render()
    {
        $this->data = Cadence::all();
        $ateliers = Atelier::pluck('name', 'id');
     
        $articles = Article::where('type', 'PF')->pluck('name', 'id');
        $lignes = $this->atelier_id ? Atelier::find($this->atelier_id)->lignes()->pluck('name', 'id') : [];
        
        return view('livewire.cadences.component', compact('ateliers', 'lignes', 'articles'));
    }

    // Fonction pour récupérer les lignes d'un atelier spécifique
    public function getLignes($atelierId)
    {
        $lignes = Ligne::where('atelier_id', $atelierId)->get();
        return response()->json($lignes);
    }

    private function resetInput()
    {
        $this->cadence = null;
        $this->unité = null;
        $this->atelier_id = null;
        $this->ligne_id = null;
        $this->article_id = null;
    }

    public function store()
    {
        $this->validate([
            'cadence' => 'required',
            'unité' => 'required',
            'atelier_id' => 'required',
            'ligne_id' => 'required',
            'article_id' => 'required',
        ]);

        // Vérifier si une cadence avec la même combinaison atelier-ligne-article existe déjà
        $existingCadence = Cadence::where('atelier_id', $this->atelier_id)
            ->where('ligne_id', $this->ligne_id)
            ->where('article_id', $this->article_id)
            ->exists();
    
        if ($existingCadence) {
            $this->addError('cadence_exists', 'Une cadence avec cette combinaison atelier-ligne-article existe déjà.');
            return;
        }

        Cadence::create([
            'cadence' => $this->cadence,
            'unité' => $this->unité,
            'atelier_id' => $this->atelier_id,
            'ligne_id' => $this->ligne_id,
            'article_id' => $this->article_id,
        ]);

        $this->resetInput();
        session()->flash('add', 'Cadence créée avec succès.');
    }

    public function edit($id)
    {
        $record = Cadence::findOrFail($id);

        $this->selected_id = $id;
        $this->cadence = $record->cadence;
        $this->unité = $record->unité;
        $this->atelier_id = $record->atelier_id;
        $this->ligne_id = $record->ligne_id;
        $this->article_id = $record->article_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'cadence' => 'required',
            'unité' => 'required',
            'atelier_id' => 'required',
            'ligne_id' => 'required',
            'article_id' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Cadence::find($this->selected_id);
            $record->update([
                'cadence' => $this->cadence,
                'unité' => $this->unité,
                'atelier_id' => $this->atelier_id,
                'ligne_id' => $this->ligne_id,
                'article_id' => $this->article_id,
            ]);

            $this->resetInput();
            $this->updateMode = false;
            session()->flash('edit', 'Cadence mise à jour avec succès.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Cadence::findOrFail($id); 
            $record->delete();
            session()->flash('delete', 'La cadence a été supprimée avec succès.');
        }
    }
}