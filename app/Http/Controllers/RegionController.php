<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $regions =Region::all();
    return view('region.Index',compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('region.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           Region::create($request-> all());
        return redirect()->route('regions.create')
                     ->with('success', 'Region créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
       
        return view('region.show', compact('region'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
         
       return view('region.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        

            $region->update([
                'nom_region' => $request->nom_region,
                'description' => $request->description,
                'population' => $request->population,
                 'superficie' => $request->superficie,
                'localisation' => $request->localisation,
            ]);

            return redirect()->route('regions.index')
                            ->with('success', 'Region mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        $region->delete();

          Region::destroy($region);
        return redirect()->route('regions.index')->with('success', 'Region successful deleted.');
    }
}
