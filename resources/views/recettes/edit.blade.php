@extends('recettes.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Recette</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('recettes.index') }}"> Back</a>
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

    <form action="{{ route('recettes.update',$recette->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" value="{{ $recette->nom }}" placeholder="{{ $recette->nom }}" name ="nom">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
