@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pridėti naują restoraną</title>

    <link href="{{ asset('sass/back/app.scss') }}" rel="stylesheet">
</head>

</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Pridėti naują restoraną</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('restaurants.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Pavadinimas</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kodas</label>
                            <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Adresas</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Pridėti naują</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection