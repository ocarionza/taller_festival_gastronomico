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
                <a href="{{ route('restaurants.show', $restaurant->id) }}" title="Visitar a este restaurante">{{ $restaurant->name }}</a>

                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-warning mt-3" href="{{ route('restaurants.edit', $restaurant->id) }}">Editar</a>

                    {{ Form::open(['route' => [
                        'restaurants.destroy', $restaurant->id], 
                        'method' => 'delete',
                        'onsubmit' => 'return confirm(\'¿Esta seguro que desea remover el restaurante?\n¡Esta acción no se puede deshacer!\')'
                    ]) }}
                    <button type="submit" class="btn btn-danger mt-3">Remover</button>
                    {!! Form::close() !!}
                </div>
            </li>
        @endforeach
        </ul>
    </div>
@endsection
