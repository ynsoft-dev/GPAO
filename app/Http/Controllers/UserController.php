<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Récupérer tous les utilisateurs avec leurs rôles
        $users = User::with('roles')->get();
    
        return view('users.index', compact('users'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|max:255',
            'equipe' => 'required|string|in:A,B,C', // Validation pour l'attribut equipe
            'role' => 'required|string|in:admin,responsable,operateur', // Validation pour le rôle
        ]);
    
        // Création d'un nouvel utilisateur
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->equipe = $request->equipe; // Assigner l'équipe
    
        // Enregistrer l'utilisateur
        $user->save();
    
        // Définir le modèle par défaut pour la méthode assignRole
        $modelType = User::class;
    
        $role = $request->role;
        $user->assignRole($role, $modelType);
        
        return redirect()->route('users.index')->with('add', 'Utilisateur créé avec succès.');
    
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Récupérer tous les rôles
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|max:255',
            'equipe' => 'required|string|in:A,B,C',
        ]);
    
        // Recherche de l'utilisateur à mettre à jour
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->equipe = $request->equipe;
    
        // Enregistrer les modifications
        $user->save();
    
        // Mise à jour des rôles
        $user->roles()->sync([]);
        if ($request->has('roles')) {
            foreach ($request->roles as $roleId) {
                $user->roles()->attach($roleId, ['model_type' => get_class($user)]);
            }
        }
    
        return redirect()->route('users.index')->with('edit', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('delete', 'Utilisateur a été supprimé avec succès.');
    }
}