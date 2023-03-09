@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create new Dish</title>

    <link href="{{ asset('sass/back/app.scss') }}" rel="stylesheet">
</head>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Sukurti naują patiekalą</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('dishes.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Pavadinimas</label>
                            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Aprašymas</label>
                            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Kaina</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" required value="{{ old('price') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="menu_id">Meniu</label>
                            <select class="form-control" id="menu_id" name="menu_id" required>
                                @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Sukurti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection