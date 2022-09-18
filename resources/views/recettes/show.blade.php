@extends('recettes.layout')
@section('content')
    <br><br>

    <a class="btn btn-info" href="{{ route('recettes.index') }}">Return</a><br><br>
<h1> Detail de la recette <b>{{ $recette->nom }}</b></h1>
    <br>


        @if(count($produits) < 1)
            <h3 style="color: #de8585">Il n'y a pas de produits dans cette recette encore  !</h3>

        @else
            @if(count($produits) == 1)
                <h3>Produit se trouvant dans la recette :</h3><br>
            @else
                <h3>Produits se trouvant dans la recette :</h3><br>
            @endif
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">nom</th>
            <th scope="col">prix</th>
            <th scope="col">quantité</th>
            <th scope="col">prix final</th>
            <th scope="col">actions</th>
        </tr>
        </thead>
        <tbody>

        <div style="display: none">
            {{ $total = 0 }}
        </div>
        @foreach($produits as $produit)
        <tr>

            <th scope="row">{{ $produit->id }}</th>
            <td>{{ $produit->nom }}</td>
            <td>{{ $produit->prix }} €</td>
            <td>x {{ $produit->quantite }}</td>
            <td>{{ $produit->prix * $produit->quantite }} €</td>

            <div style="display: none">{{$total += $produit->prix * $produit->quantite }}</div>


            <td>
                <form action="{{ route('produits.destroy',$produit->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('produits.edit',$produit->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
<br><br>
    <table class="table table-sm">
        <thead>

        </thead>
        <tbody>
        </tbody>
        <tr style="background-color: #78848f">
            <th style="color: whitesmoke">Prix total de la recette :</th>
            <th style="color: whitesmoke"><h1><b>{{$total}} €</b></h1></th>
        </tr>
    </table>


        @endif




@endsection
