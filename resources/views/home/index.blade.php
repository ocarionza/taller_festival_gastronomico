@extends('layouts.app')

@section('content')

    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <!--<ol class="carousel-indicators">
                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active mb-1"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="1" class="mb-1"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="2" class="mb-1"></li>
                </ol>-->
            <div class="carousel-inner">
                {{-- <!-- si no hay nada o falla la consulta, retorna @empty--> --}}
                    @forelse($restaurants as $restaurant)
                        <div class="carousel-item @if($loop->index==0) active @endif">
                            @if (!$restaurant->logo)
                                    <a href="{{ route("restaurants.view", $restaurant->id) }}"><img src="{{ asset('images/restaurant.png') }}" 
                                    class="d-block w-100" 
                                    alt="{{$restaurant->name}}"
                                    style="width: 100%;height: 555px"></a>
                                @else
                                <a href="{{ route("restaurants.view", $restaurant->id) }}"><img src="{{ asset('images/' . $restaurant->logo) }}" 
                                    class="d-block w-100" 
                                    alt="{{$restaurant->name}}"
                                    style="width: 100%;height: 555px"></a>

                            @endif
                            <div class="bg-dark text-center" style="width:100%;height:auto; color:white;">
                                <h1 class="display-7" style="padding-top: 10px;">{{ $restaurant->name }}</h1>
                                <p class="lead" style="padding-bottom: 10px;">{{ Str::limit($restaurant->description, 100, '...') }}</p>
                            </div>
                        </div>
                    @empty
                    @endforelse
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
        </div>  
        <div class="jumbotron">
            <h1 class="display-4">Hola, Bienvenido!</h1>
            <blockquote class="blockquote text-right mt-4">
                <p class="mb-0">Presentado por:</p>
                <footer class="blockquote-footer">Jose Brayan Ocampo Castaño</footer>
                <footer class="blockquote-footer">Santiago Galvis Tabares</footer>
                <hr class="my-4">
            </blockquote>
            <p class="lead">Los mejores eventos gastronómicos a nivel nacional, síguenos, participa, disfruta y califica nuestros restaurantes.
                ya estamos disponibles en Bogotá, Cali, Medellín, Pereira, Armenia, Manizales y Barranquilla.
            </p>
            <p>Si desea ver el listado de restaurantes, de click en el siguiente botón</p>
            <a class="btn btn-primary btn-lg" href="{{ route('front_page.index') }}" role="button">Nuestros Restaurantes</a>
        </div>
    </div>
@endsection
