@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron">
        <h1>ADMINISTRAR RESTAURANTES</h1>
        <a href="{{ route('restaurants.create') }}" class="btn btn-dark btn-lg btn-block mt-4" 
            title="Crear un nuevo restaurante">Crear</a>

        <table class="table table-striped mt-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Acciones</th>
                </tr>   
            </thead>
            <tbody>
                @foreach($restaurants as $restaurant)
                    <tr>
                        <td>{{ $restaurant->name }}</td>
                        <td>{{ Str::limit($restaurant->description, 100, '...') }}</td>
                        <td>{{ $restaurant->Category->name }}</td>
                        <td>
                            @if (!$restaurant->logo)
                                    <img src="{{ asset('images/restaurant.png') }}" style="width: 253;height:127px" class="ml-5">
                                @else
                                    <img src="{{ asset('images/' . $restaurant->logo) }}" style="width: 253;height:127px" class="ml-5">
                            @endif
                        </td>
                        <td>                       
                                <a href="{{ route('restaurants.show', $restaurant->id) }}" title="Visitar a este restaurante"></a>
                
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-success mr-3" href="{{ route('restaurants.show', $restaurant->id) }}" title="Visitar a este restaurante">VER</a>
                                    <a class="btn btn-primary mr-3" href="{{ route('restaurants.edit', $restaurant->id) }}">MODIFICAR</a>
                                    {{ Form::open(['route' => [
                                        'restaurants.destroy', $restaurant->id], 
                                        'method' => 'delete',
                                        'onsubmit' => 'return confirm(\'¿Esta seguro que desea remover el restaurante?\n¡Esta acción no se puede deshacer!\')'
                                    ]) }}
                                    <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                    {!! Form::close() !!}
                                </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
