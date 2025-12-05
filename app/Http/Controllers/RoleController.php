<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    { 
        $roles = Role::with('utilisateurs')->get();
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        Role::create($request->all());
        return redirect()->route('roles.create')->with('success', 'Role créé avec succès.');
    }

    public function show(Role $role)
    {
        return view('role.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('role.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $role->update([
            'nom' => $request->nom,
        ]);

        return redirect()->route('roles.index')
                         ->with('success', 'Role mise à jour avec succès.');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')
                         ->with('success', 'Role successful deleted.');
    }
}
