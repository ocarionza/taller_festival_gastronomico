@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Crear Usuario</h1>
            <p class="lead">Ventana que le permite crear un usuario</p>
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

            {{ Form::open(['route' => 'users.store', 'method' => 'post']) }}
                @include('users.form_fields')

                {{ Form::submit('Crear', ['class' => 'btn btn-primary mt-2']); }}
                <a href="{{ route('users.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
