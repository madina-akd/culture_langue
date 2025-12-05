<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Langue;
class LanguesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $langues =Langue::all();
    return view('langues.Index',compact('langues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('langues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         Langue::create($request-> all());
        return redirect()->route('langues.create')->with('success', 'Langue créé avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $langue = Langue::findOrFail($id);
        return view('langues.show', compact('langue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $langue = Langue::findOrFail($id);
        return view('langues.edit', compact('langue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $langue = Langue::findOrFail($id);

            $langue->update([
                'nom_langue' => $request->nom_langue,
                'code_langue' => $request->code_langue,
                'description' => $request->description,
            ]);

            return redirect()->route('langues.index')
                            ->with('success', 'Langue mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {    
        Langue::destroy($id);
        return redirect()->route('langues.index')->with('success', 'Language successful deleted.');
    }
}
