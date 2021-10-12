@extends("layouts.app")

@section('content')
    <div class="container">
        <h1>Crear un nuevo restaurante</h1>

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

            {{ Form::submit('Crear', ['class' => 'btn btn-primary mt-2']); }}
            <a href="{{ route('home') }}" class="btn btn-secondary mt-2">Cancelar</a>
        {!! Form::close() !!}
    </div>
@endsection
