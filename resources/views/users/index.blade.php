@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Administrar Usuarios</h1>
        <p class="lead">Ventana que le permitira realizar acciones con sus usuarios</p>
        <hr class="my-4">
        <a href="{{ route('users.create') }}" class="btn btn-dark btn-lg btn-block mt-4" 
            title="Crear un nuevo usuario">Crear</a>

        <table class="table table-striped mt-4 table-responsive text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Acciones</th>
                </tr>   
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td style="width: 66px;height:auto">{{ $user->id }}</td>
                        <td style="width: 200px;height:auto">{{ $user->name }}</td>
                        <td style="width: 263px;height:auto">{{ $user->email }}</td>
                        <td style="width: 112px;height:auto">{{ $user->type }}</td>
                        <td style="width: 408px;height:auto">                                       
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-primary mr-3" href="{{ route('users.edit', $user->id) }}">MODIFICAR</a>
                                    {{ Form::open(['route' => [
                                        'users.destroy', $user->id], 
                                        'method' => 'delete',
                                        'onsubmit' => 'return confirm(\'¿Esta seguro que desea eliminar el usuario?\n¡Esta acción no se puede deshacer!\')'
                                    ]) }}
                                    <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                    {!! Form::close() !!}
                                </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>

@endsection
