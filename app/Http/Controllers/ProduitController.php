<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Recette;
use App\Models\Unite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::select('id', 'nom', 'prix', 'quantite', 'recette_id', 'unite_id')
            ->orderBy('id', 'asc')
            ->get();
        $recettes = Recette::all();
        return view('produits.index', compact('produits','recettes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recettes = Recette::all();
        $unites = Unite::all();
        return view('produits.create', compact('recettes','unites'));
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
            'prix' => 'required',
            'quantite' => 'required',
            'recette_id' => 'required',
            'unite_id' => 'required',
        ]);

        Produit::create($request->all());

        return redirect()->route('produits.index')
            ->with('success','Produit created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        $recettes = Recette::all();
        return view('produits.show',compact('produit', 'recettes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $recettes = Recette::all();
        $unites = Unite::all();
        return view('produits.edit',compact('produit', 'recettes', 'unites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'quantite' => 'required',
            'recette_id' => 'required',
            'unite_id' => 'required',
        ]);

        $produit->update($request->all());

        return redirect()->route('produits.index')
            ->with('success','Produit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();

        return redirect()->route('produits.index')
            ->with('success','Produit deleted successfully');
    }

}
