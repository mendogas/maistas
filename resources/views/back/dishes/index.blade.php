@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Patiekalai') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('Pavadinimas') }}</th>
                                <th scope="col">{{ __('Aprašymas') }}</th>
                                <th scope="col">{{ __('Kaina') }}</th>
                                <th scope="col">{{ __('Meniu') }}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dishes as $dish)
                            <tr>
                                <td>{{ $dish->name }}</td>
                                <td>{{ $dish->description }}</td>
                                <td>{{ $dish->price }} €</td>
                                <td>{{ $dish->menu->name }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-sm btn-primary">{{ __('Redaguoti') }}</a>
                                        <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">{{ __('Ištrinti') }}</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection