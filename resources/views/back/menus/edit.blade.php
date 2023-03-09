@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Redaguoti meniu</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('menus.update', $menu->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Pavadinimas:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $menu->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Aprašymas:</label>
                            <textarea class="form-control" id="description" name="description">{{ $menu->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="restaurant_id">Restoranas:</label>
                            <select class="form-control" id="restaurant_id" name="restaurant_id" required>
                                @foreach($restaurants as $restaurant)
                                <option value="{{ $restaurant->id }}" {{ $menu->restaurant_id == $restaurant->id ? 'selected' : '' }}>{{ $restaurant->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Atnaujinti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection