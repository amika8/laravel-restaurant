@extends('produits.layout')
@section('content')
    <!--Button to add a new produit-->
<br>
    <h1>Liste des produits</h1><br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('produits.create') }}"> Nouveau produit</a>
            </div>
        </div>
    </div>
    <br>
    <!--Section to display a success message-->

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">nom</th>
            <th scope="col">unité</th>
            <th scope="col">prix</th>
            <th scope="col">quantité</th>
            <th scope="col">prix final</th>
            <th scope="col">présent dans la recette</th>
            <th scope="col">actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($produits as $produit)
            <tr>
                <th scope="row">{{ $produit->id }}</th>
                <td>{{ $produit->nom }}</td>
                <td>{{ $produit->unite->nom }}</td>
                <td>{{ $produit->prix }} €</td>
                <td>x {{ $produit->quantite }}</td>
                <td>{{ $produit->prix * $produit->quantite}} €</td>
                <td>{{$produit->recette->nom}} </td>
                <td>
                    <form action="{{ route('produits.destroy',$produit->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('produits.show',$produit->id) }}">Show</a>

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



@endsection
