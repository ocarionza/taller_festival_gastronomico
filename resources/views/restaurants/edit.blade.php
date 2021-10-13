@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Modificar Restaurantes</h1>
            <p class="lead">Formulario que le permitira modificar un restaurante</p>
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

            {{ Form::model($restaurant, ['route' => ['restaurants.update', $restaurant->id], 'method' => 'put', 'files' => true]) }}
                @include('restaurants.form_fields')

                {{ Form::submit('Editar', ['class' => 'btn btn-primary']); }}
                <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancelar</a>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
