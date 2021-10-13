@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron">
            
        <h1 class="display-4">Nuestros Restaurantes!</h1>
        <p class="lead">Aqui tiene el listado completo de todos los restaurantes que hacen parte de la feria, puedes filtarr por tu categoria favorita</p>
        <hr class="my-4">

        {{ Form::open(['url' => route('front_page.index'), 'method' => 'get']) }}
        <div class="input-group mb-3 mt-4">
                {{ Form::select('filter', $categories, $filter, ['class' => 'form-control', 'aria-describedby' => 'button-filter', 'placeholder'=>'Selecione una categoria']) }}   
                {{ Form::button('<i class="fas fa-search"></i>', [
                    'class' => 'btn', 
                    'id' => 'button-filter',
                    'type' => 'submit'
                ]) }}
        </div>
        {!! Form::close() !!}

        <?php
        $rows = $restaurants->count() / 4;
        ?>

        @for ($i = 0; $i < $rows; $i++)

            <div class="row">

                @for ($j = 0; $j < 4; $j++)

                    @if (isset($restaurants[$i * 4 + $j]))
                        <?php
                        $restaurant = $restaurants[$i * 4 + $j];
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3 mt-3">                        
                            <div class="card">
                                @if (!$restaurant->logo)
                                    <img src="{{ asset('images/restaurant.png') }}" class="card-img-top" style="width: 253;height:127px">
                                @else
                                    <img src="{{ asset('images/' . $restaurant->logo) }}" class="card-img-top" style="width: 253;height:127px">
                                @endif
                                    <div class="card-body" style="height: 12rem">
                                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                                        <h6 class="text-muted">{{ $restaurant->category->name }}</h6>
                                        <p class="card-text">{{ Str::limit($restaurant->description, 50, '...') }}</p>
                                        <a href="{{ route("restaurants.show", $restaurant->id) }}" class="btn btn-primary">Visítenos</a>
                                    </div>
                            </div>
                        </div>
                    @endif

                @endfor

            </div>

        @endfor

        {{ $restaurants->links() }}
    </div>
</div>

@endsection
