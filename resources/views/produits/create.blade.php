@extends('produits.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Produit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('produits.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check your fields<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produits.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control"  placeholder="Enter Nom" name ="nom">
        </div>
        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" class="form-control"  placeholder="Enter Prix" name ="prix">
        </div>
        <div class="form-group">
            <label for="quantite">Quantité</label>
            <input type="number" class="form-control"  placeholder="Enter Quantite" name ="quantite">
        </div>
        <div class="form-group">
            <label for="unite_id">Unité</label>
            <select name="unite_id" id="unite_id" class="form-control">
                @foreach($unites as $unite)
                    <option value="{{ $unite->id }}">{{$unite->nom}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="recette_id">ID recette</label>
            <select name="recette_id" id="recette_id" class="form-control">
                @foreach($recettes as $recette)
                    <option value="{{ $recette->id }}">{{$recette->nom}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
