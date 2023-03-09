@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Restoranų sąrašas</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Pavadinimas</th>
                                <th scope="col">Adresas</th>
                                <th scope="col">Veiksmai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($restaurants as $restaurant)
                            <tr>
                                <th scope="row">{{ $restaurant->id }}</th>
                                <td>{{ $restaurant->name }}</td>
                                <td>{{ $restaurant->address }}</td>
                                <td>
                                    <a href="{{ route('restaurants.show', $restaurant->id) }}" class="btn btn-primary">Peržiūrėti</a>
                                    <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-warning">Redaguoti</a>
                                    <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST" class="d-inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Ar tikrai norite ištrinti šį restoraną?')">Ištrinti</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        <a href="{{ route('restaurants.create') }}" class="btn btn-outline-primary">Pridėti naują</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection