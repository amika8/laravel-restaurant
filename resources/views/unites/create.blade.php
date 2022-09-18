@extends('unites.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Unite</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('unites.index') }}"> Back</a>
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

    <form action="{{ route('unites.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control"  placeholder="Enter Nom" name ="nom">
        </div>
        <div class="form-group">
            <label for="convertisseur">Convertisseur</label>
            <input type="number" class="form-control"  placeholder="Enter Convertisseur" name ="convertisseur">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
