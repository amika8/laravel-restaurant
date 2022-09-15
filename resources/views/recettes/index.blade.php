@extends('recettes.layout')
@section('content')
    <!--Button to add a new recette-->
<br><h1>Liste des Recettes</h1><br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('recettes.create') }}"> Nouvelle recette</a>
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

    <div style="display: none">
        {{ $total = 0 }}
    </div>


    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">nom</th>
            <th scope="col">prix de la recette</th>
            <th scope="col">liste des produit(s) dans la recette</th>
            <th scope="col">actions</th>

        </tr>
        </thead>
        <tbody>

        @foreach ($recettes as $recette)
            @foreach($recette->produits as $produit)
                <div style="display: none">
                {{$total += $produit->prix * $produit->quantite}}
                </div>
            @endforeach
            <tr>
                <th scope="row">{{ $recette->id }}</th>
                <td>{{ $recette->nom }}</td>
                <td>{{$total}} €</td>
                <div style="display: none">
                    {{ $total = 0 }}
                </div>
                <td>
                    @foreach($recette->produits as $produit)
                        <b><i>{{$produit->nom}}</i></b><br>
                    @endforeach
                </td>

                <td>
                    <form action="{{ route('recettes.destroy',$recette->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('recettes.show',$recette->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('recettes.edit',$recette->id) }}">Edit</a>

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
