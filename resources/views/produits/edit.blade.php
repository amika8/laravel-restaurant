@extends('produits.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Produit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('produits.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check your fields.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produits.update',$produit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" value="{{ $produit->nom }}"  placeholder="{{ $produit->nom }}" name ="nom">
        </div>
        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" class="form-control" value="{{ $produit->prix }}" placeholder="{{ $produit->prix }}" name ="prix">
        </div>
        <div class="form-group">
            <label for="quantite">Quantite</label>
            <input type="number" class="form-control" value="{{ $produit->quantite }}" placeholder="{{ $produit->quantite }}" name ="quantite">
        </div>
        <div class="form-group">
            <label for="unite_id">Unité</label>
            <select name="unite_id" id="unite_id" class="form-control">
                @foreach($unites as $unite)
                    <option value="{{ $unite->id }}" placeholder="{{ $unite->nom }}" >{{$unite->nom}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="recette_id">ID recette</label>
            <select name="recette_id" id="recette_id" class="form-control">
                @foreach($recettes as $recette)
                    <option value="{{ $recette->id }}" placeholder="{{ $recette->nom }}" >{{$recette->nom}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
