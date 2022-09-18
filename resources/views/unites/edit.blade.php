@extends('unites.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Unite</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('unites.index') }}"> Back</a>
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

    <form action="{{ route('unites.update',$unite->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" value="{{ $unite->nom }}" placeholder="{{ $unite->nom }}" name ="nom">
        </div>
        <div class="form-group">
            <label for="convertisseur">Convertisseur</label>
            <input type="number" class="form-control" value="{{ $unite->convertisseur }}" placeholder="{{ $unite->convertisseur }}" name ="convertisseur">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
