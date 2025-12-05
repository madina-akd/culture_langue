<?php

namespace App\Http\Controllers;

use App\Models\TypeMedia;
use Illuminate\Http\Request;

class TypeMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typemedias =TypeMedia::all();
    return view('typemedia.Index',compact('typemedias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('typemedia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TypeMedia::create($request-> all());
        return redirect()->route('typemedia.create')
                     ->with('success', 'TypeMedia créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeMedia $typemedia)
    {
        return view('typemedia.show', compact('typemedia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeMedia $typemedia)
    {
        return view('typemedia.edit', compact('typemedia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeMedia $typemedia)
    {
         $typemedia->update([
                'nom' => $request->nom,
                'prix' => $request->prix,
                
            ]);

            return redirect()->route('typemedia.index')
                            ->with('success', 'Typemedia mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeMedia $typemedia)
    {
         $typemedia->delete();

        return redirect()->route('typemedia.index')
                         ->with('success', 'typemedia successful deleted.');
    }
}
