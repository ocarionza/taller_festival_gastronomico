@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Modificar Categoria</h1>
            <p class="lead">Ventana que le permite modificar una categoria</p>
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

            {{ Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'put']) }}
                @include('categories.form_fields')

                {{ Form::submit('Editar', ['class' => 'btn btn-primary']); }}
                <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancelar</a>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
