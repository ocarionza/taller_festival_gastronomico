@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Crear Categoria</h1>
            <p class="lead">Ventana que le permite crear una categoria</p>
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

            {{ Form::open(['route' => 'categories.store', 'method' => 'post']) }}
                @include('categories.form_fields')

                {{ Form::submit('Crear', ['class' => 'btn btn-primary mt-2']); }}
                <a href="{{ route('home') }}" class="btn btn-secondary mt-2">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
