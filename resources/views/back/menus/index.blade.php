@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Meniu sąrašas</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Pavadinimas</th>
                                <th scope="col">Restoranas</th>
                                <th scope="col">Veiksmai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                            <tr>
                                <th scope="row">{{ $menu->id }}</th>
                                <td>{{ $menu->title }}</td>
                                <td>{{ $menu->restaurant->name }}</td>
                                <td>
                                    <a href="{{ route('menus.show', $menu->id) }}" class="btn btn-primary">Peržiūrėti</a>
                                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning">Redaguoti</a>
                                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Ar tikrai norite ištrinti šį meniu?')">Ištrinti</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        <a href="{{ route('menus.create') }}" class="btn btn-outline-primary">Pridėti naują</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection