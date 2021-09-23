@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Mis Restaurantes</h1>
        <a href="{{ route('restaurants.create') }}" class="btn btn-primary" 
            title="Crear un nuevo restaurante">Crear</a>
        <br>
        <br>
        <ul class="list-group list-group-flush">
        @foreach($restaurants as $restaurant)
            <li class="list-group-item h4">
                <!-- TODO: agregar el enlace a ver restaurante de propietario -->
                <a href="" title="Visitar a este restaurante">{{ $restaurant->name }}</a>
            </li>
        @endforeach
        </ul>
    </div>
@endsection
