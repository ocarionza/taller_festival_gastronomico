@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Administrar Categorias</h1>
        <p class="lead">Ventana que le permitira realizar acciones con sus categorias</p>
        <hr class="my-4">
        <a href="{{ route('categories.create') }}" class="btn btn-dark btn-lg btn-block mt-4" 
            title="Crear un nueva categoria">Crear</a>

        <table class="table table-striped mt-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Acciones</th>
                </tr>   
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>                                       
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-primary mr-3" href="{{ route('categories.edit', $category->id) }}">MODIFICAR</a>
                                    {{ Form::open(['route' => [
                                        'categories.destroy', $category->id], 
                                        'method' => 'delete',
                                        'onsubmit' => 'return confirm(\'¿Esta seguro que desea remover la categoria?\n¡Esta acción no se puede deshacer!\')'
                                    ]) }}
                                    <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                    {!! Form::close() !!}
                                </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
</div>
@endsection
