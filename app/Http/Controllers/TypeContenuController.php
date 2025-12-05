<?php

namespace App\Http\Controllers;

use App\Models\TypeContenu;
use Illuminate\Http\Request;

class TypeContenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typecontenus =TypeContenu::all();
    return view('typecontenu.Index',compact('typecontenus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('typecontenu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TypeContenu::create($request-> all());
        return redirect()->route('typecontenu.create')
                     ->with('success', 'TypeContenu créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeContenu $typecontenu)
    {
        return view('typecontenu.show', compact('typecontenu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeContenu $typecontenu)
    {
        

    return view('typecontenu.edit', compact('typecontenu'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeContenu $typecontenu)
    {
         $typecontenu->update([
                'nom' => $request->nom,
                
            ]);

            return redirect()->route('typecontenu.index')
                            ->with('success', 'typecontenu mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeContenu $typecontenu)
    {
         $typecontenu->delete();

        return redirect()->route('typecontenu.index')
                         ->with('success', 'typecontenu successful deleted.');
    }
}
