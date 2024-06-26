<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::orderBy('id')->paginate(5);
        return view('roles.index', compact('roles'));
    }
  
    public function create()
    {
        $permission = Permission::get();
        return view('roles.create', compact('permission'));
    }
  
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required|array',
        ]);

        $role = Role::create(['name' => $request->input('name')]);

        foreach ($request->input('permission') as $permissionId) {
            $permission = Permission::find($permissionId);

            if ($permission) {
                $role->givePermissionTo($permission);
            }
        }

        return redirect()->route('roles.index')->with('add', 'Rôle créé avec succès.');
    }
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();
        return view('roles.show', compact('role', 'rolePermissions'));
    }
    public function edit($id)
    {
        
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required|array',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->permissions()->detach();

        foreach ($request->input('permission') as $permissionId) {
            $permission = Permission::find($permissionId);

            if ($permission) {
                $role->givePermissionTo($permission);
            }
        }

        return redirect()->route('roles.index')->with('edit', 'Rôle modifié avec succès.');
    }


    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')->with('delete', 'Le rôle a été supprimé avec succès.');
    }
}
