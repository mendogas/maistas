@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pridėti naują meniu</title>

    <link href="{{ asset('sass/back/app.scss') }}" rel="stylesheet">
</head>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Pridėti naują meniu</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('menus.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Pavadinimas</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Restoranas</label>
                            <select class="form-control" name="restaurant_id">
                                @foreach ($restaurants as $restaurant)
                                <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Pridėti naują</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection