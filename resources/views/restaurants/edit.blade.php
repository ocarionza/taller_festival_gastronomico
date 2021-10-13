@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1>Editar un restaurante</h1>

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
