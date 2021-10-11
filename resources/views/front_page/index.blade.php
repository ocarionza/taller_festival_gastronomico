@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Nuestros restaurantes</h1>

        {{ Form::open(['url' => route('front_page.index'), 'method' => 'get']) }}
        <div class="input-group mb-3 mt-4">
                {{ Form::select('filter', $categories, $filter, ['class' => 'form-control', 'aria-describedby' => 'button-filter']) }}
                {{ Form::button('<i class="fas fa-search"></i>', [
                    'class' => 'btn', 
                    'id' => 'button-filter',
                    {{-- 'onclick' => 'submit()', --}}
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

                        <div class="col-3 mb-3 mt-3">                        
                            <div class="card">
                                @if (!$restaurant->logo)
                                    <img src="{{ asset('images/restaurant.png') }}" class="card-img-top">
                                @else
                                    <img src="{{ asset('images/' . $restaurant->logo) }}" class="card-img-top">
                                @endif
                                    <div class="card-body" style="height: 12rem">
                                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                                        <h6 class="text-muted">{{ $restaurant->category->name }}</h6>
                                        <p class="card-text">{{ $restaurant->description }}</p>
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

@endsection
