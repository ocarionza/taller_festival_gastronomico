@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Crear Restaurantes</h1>
            <p class="lead">Formulario que le permite crear un restaurante</p>
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

            {{ Form::open(['route' => 'restaurants.store', 'method' => 'post', 'files' => true]) }}
                @include('restaurants.form_fields')

                {{ Form::submit('Crear', ['class' => 'btn btn-primary']); }}
                <a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
