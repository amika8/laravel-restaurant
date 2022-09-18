@extends('unites.layout')
@section('content')
    <br><br>

    <a class="btn btn-info" href="{{ route('unites.index') }}">Return</a><br><br>
<h1> Detail de la unite <b>{{ $unite->nom }}</b></h1>
    <br>
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


@endsection
