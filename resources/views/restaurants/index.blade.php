@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Administrar Restaurantes</h1>
        <p class="lead">Ventana que le permitira realizar acciones con sus restaurantes</p>
        <hr class="my-4">
        <a href="{{ route('restaurants.create') }}" class="btn btn-dark btn-lg btn-block mt-4" 
            title="Crear un nuevo restaurante">Crear</a>

        <table class="table table-striped mt-4 table-responsive text-center">
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
                        <td style="width: 141px;height:auto">{{ $restaurant->name }}</td>
                        <td style="width: 165px;height:auto">{{ Str::limit($restaurant->description, 100, '...') }}</td>
                        <td style="width: 109px;height:auto">{{ $restaurant->Category->name }}</td>
                        <td style="width: 326px;height:auto">
                            @if (!$restaurant->logo)
                                    <img src="{{ asset('images/restaurant.png') }}" style="width: 253;height:127px" class="ml-5">
                                @else
                                    <img src="{{ asset('images/' . $restaurant->logo) }}" style="width: 253;height:127px" class="ml-5">
                            @endif
                        </td>
                        <td style="width: 307px;height:auto">                       
                                <a href="{{ route('restaurants.show', $restaurant->id) }}" title="Visitar a este restaurante"></a>
                
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-success mr-3" href="{{ route('restaurants.show', $restaurant->id) }}" title="Visitar a este restaurante">VER</a>
                                    @if ($restaurant->user_id == Auth::id() || Auth::user()->type == 'admin')
                                        <a class="btn btn-primary mr-3" href="{{ route('restaurants.edit', $restaurant->id) }}">MODIFICAR</a>
                                        {{ Form::open(['route' => [
                                            'restaurants.destroy', $restaurant->id], 
                                            'method' => 'delete',
                                            'onsubmit' => 'return confirm(\'¿Esta seguro que desea remover el restaurante?\n¡Esta acción no se puede deshacer!\')'
                                        ]) }}
                                        <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                    @else


                                    @endif
                                    {!! Form::close() !!}
                                </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $restaurants->links() }}
    </div>
</div>
@endsection