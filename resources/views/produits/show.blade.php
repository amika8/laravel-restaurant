@extends('produits.layout')
@section('content')
    <br>

    <a class="btn btn-info" href="{{ route('produits.index') }}">Return</a>

    <br><br>
    <!--A table to display the produits:-->
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">nom</th>
            <th scope="col">unité</th>
            <th scope="col">prix</th>
            <th scope="col">quantite</th>
            <th scope="col">prix final</th>
            <th scope="col">actions</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $produit->id }}</th>
                <td>{{ $produit->nom }}</td>
                <td>{{ $produit->unite->nom }}</td>
                <td>{{ $produit->prix }} €</td>
                <td>x {{ $produit->quantite }}</td>
                <td>{{ $produit->prix * $produit->quantite}} €</td>
                <td>
                    <form action="{{ route('produits.destroy',$produit->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('produits.edit',$produit->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    @if(empty($produit->recette))
        <h3 style="color: darkred">Pas de recette pour ce produit encore  !</h3>

    @else
        <br><br>
        <table class="table table-sm">
            <thead>

            </thead>
            <tbody>
            </tbody>
            <tr style="background-color: #78848f">
                <th style="color: whitesmoke">Ce produit est dans la recette nommé :</th>
                <th style="color: whitesmoke"><h1><b>{{$produit->recette->nom}} </b></h1></th>
            </tr>
        </table>
    @endif



@endsection
