@extends("layouts.app")

@section('content')
    <div class="container">
        <h1>Editar una categoria</h1>

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
@endsection
