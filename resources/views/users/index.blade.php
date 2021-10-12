@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Mis Usuarios</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary" 
            title="Crear un nuevo usuario">Crear</a>
        <br>
        <br>
        <ul class="list-group list-group-flush">
        @foreach($users as $user)
            <li class="list-group-item h4">
                <h4>{{ $user->name }}</h4>

                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-warning mt-3" href="{{ route('users.edit', $user->id) }}">Editar</a>

                    {{ Form::open(['route' => [
                        'users.destroy', $user->id], 
                        'method' => 'delete',
                        'onsubmit' => 'return confirm(\'¿Esta seguro que desea eliminar el usuario?\n¡Esta acción no se puede deshacer!\')'
                    ]) }}
                    <button type="submit" class="btn btn-danger mt-3">Remover</button>
                    {!! Form::close() !!}
                </div>
            </li>
        @endforeach
        </ul>
        {{ $users->links() }}
    </div>
@endsection
