@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Redaguoti restoraną</title>

    <link href="{{ asset('sass/back/app.scss') }}" rel="stylesheet">
</head>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Redaguoti restoraną</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('restaurants.update', $restaurant->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Pavadinimas</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $restaurant->name) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kodas</label>
                            <input type="text" class="form-control" name="code" value="{{ old('code', $restaurant->code) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Adresas</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address', $restaurant->address) }}">
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Išsaugoti pakeitimus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection