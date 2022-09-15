<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recettes = Recette::select('id', 'nom')
            ->orderBy('id', 'asc')
            ->get();

        return view('recettes.index', compact('recettes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recettes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
        ]);

        Recette::create($request->all());

        return redirect()->route('recettes.index')
            ->with('success','Recette created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function show(Recette $recette)
    {
        //a voir :
        $produits = Produit::with('recette')->whereIn('recette_id', $recette)->get();
        return view('recettes.show',compact('recette', 'produits'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function edit(Recette $recette)
    {
        return view('recettes.edit',compact('recette'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recette $recette)
    {
        $request->validate([
            'nom' => 'required',
        ]);

        $recette->update($request->all());

        return redirect()->route('recettes.index')
            ->with('success','Recette updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recette $recette)
    {

        $recette->delete();

        return redirect()->route('recettes.index')
            ->with('success','Recette deleted successfully');
    }
}
