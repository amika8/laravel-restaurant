@extends('unites.layout')
@section('content')
    <!--Button to add a new unite-->
<br><h1>Liste des Unites</h1><br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('unites.create') }}"> Nouvelle unite</a>
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
            <th scope="col">convertisseur</th>
            <th scope="col">actions</th>

        </tr>
        </thead>
        <tbody>

        @foreach ($unites as $unite)
            <tr>
                <th scope="row">{{ $unite->id }}</th>
                <td>{{ $unite->nom }}</td>
                <td>{{$unite->convertisseur}}</td>
                <td>
                    <form action="{{ route('unites.destroy',$unite->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('unites.edit',$unite->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button aria-disabled="true" class="btn btn-danger">Delete</button>

                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
