@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Editar Usuario</h1>
            <p class="lead">Ventana que le permitira modificar un usuario</p>
            <hr class="my-4">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

            {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) }}
                <div class="mb mb-2">
                    {{ Form::label('name', 'Nombre', ['class' => 'form-label']) }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'minlength' => 10, 'maxlength' => 40]) }}
                </div>
                <div class="mb mb-2">
                    {{ Form::label('email', 'Email', ['class' => 'form-label']) }}
                    {{ Form::email('email', null, ['class' => 'form-control']) }}
                </div>
                <div class="mb mb-2">
                    {{ Form::label('password', 'Contraseña', ['class' => 'form-label']) }}
                    {{ Form::password('password',['class' => 'form-control', 'maxlength' => 30]) }}
                </div>
                <div class="mb mb-3">
                    {{ Form::label('type', 'Tipo usuario', ['class' => 'form-label']) }}
                    {{ Form::select('type', [ 'user' => 'user', 'owner' => 'owner', 'admin' => 'admin'], null, ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Editar', ['class' => 'btn btn-primary']); }}
                <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancelar</a>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
