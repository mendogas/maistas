@extends('layouts.back')

@section('content')
<h1>Redaguoti patiekalą</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Įvyko klaida.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('dishes.update', $dish->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Pavadinimas:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $dish->name }}" required>
    </div>

    <div class="form-group">
        <label for="description">Aprašymas:</label>
        <textarea class="form-control" id="description" name="description">{{ $dish->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="price">Kaina:</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $dish->price }}" required>
    </div>

    <div class="form-group">
        <label for="menu_id">Meniu:</label>
        <select class="form-control" id="menu_id" name="menu_id" required>
            @foreach ($menus as $menu)
            <option value="{{ $menu->id }}" {{ $menu->id == $dish->menu_id ? 'selected' : '' }}>
                {{ $menu->name }}
            </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Atnaujinti</button>
</form>

@endsection