@extends('layouts.app')

@section('content')

<div class="col-md-3 col-xl-2 bd-sidebar position-fixed" style="margin-bottom: -231px;">
   <a class="btn btn-dark mb-2" target="_blank" href="{{ $restaurant->facebook }}" style="width: 55px;height: auto;"><i class="fab fa-facebook fa-2x mt-1 mb-1"></i></a><br>
   <a class="btn btn-dark mb-2" target="_blank" href="{{ $restaurant->youtube }}" style="width: 55px;height: auto;"><i class="fab fa-youtube fa-2x mt-1 mb-1 mr-3"></i></a><br>
   <a class="btn btn-dark mb-2" target="_blank" href="{{ $restaurant->instagram }}" style="width: 55px;height: auto;"><i class="fab fa-instagram fa-2x mt-1 mb-1"></i></a><br>
   <a class="btn btn-dark mb-2" target="_blank" href="{{ $restaurant->twitter }}" style="width: 55px;height: auto;"><i class="fab fa-twitter-square fa-2x mt-1 mb-1"></i></a><br>
</div>

<div class="container">
      <div class="carousel-inner">
         <div class="carousel-item active">
            @if (!$restaurant->logo)
            <img src="{{ asset('images/restaurant.png') }}" class="img-fluid" alt="{{ $restaurant ->name }}" style="width: 100%;height: auto;">
            @else
            <img src="{{ asset('images/' . $restaurant->logo) }}" class="img-fluid" alt="{{ $restaurant ->name }}" style="width: 100%;height: auto;">
            @endif
         </div>
      </div>

   <div class="jumbotron">

   @if (Auth::guest())

   @else 
      @if (Auth::user()->type != 'admin' & Auth::user()->type != 'owner')
      
      @else
         @if ($restaurant->user_id == Auth::id() || Auth::user()->type == 'admin')
            <blockquote class="blockquote text-right">
               <div class="btn-group" role="group" aria-label="Basic example">
                  <a class="btn btn-dark mr-2" href="{{ route('restaurants.edit', $restaurant->id) }}" style="width: 55px;height: auto;"><i class="fas fa-pen-square fa-2x mt-1 mb-1"></i></a>
                  {{ Form::open(['route' => [
                     'restaurants.destroy', $restaurant->id], 
                     'method' => 'delete',
                     'onsubmit' => 'return confirm(\'¿Esta seguro que desea remover el restaurante?\n¡Esta acción no se puede deshacer!\')'
                  ]) }}
                  <button type="submit" class="btn btn-dark" style="width: 55px;height: auto;"><i class="fas fa-trash-alt fa-2x mt-1 mb-1"></i></button>
                  {!! Form::close() !!}
               </div>
            </blockquote> 
         @else

         @endif
      @endif
   @endif

      <h1 class="display-4">{{ $restaurant ->name }}</h1>
      <p class="lead">{{ $restaurant->category->name }}</p>
      <hr class="my-4">
      <p>{{ $restaurant->description }}</p>
         @if($restaurant->delivery == 'y')
            <blockquote class="blockquote text-right mt-4">
            <p class="mb-0">Tenemos domicilios al número.</p>
            <footer class="blockquote-footer">{{ $restaurant->phone }} <cite title="Source Title">Colombia</cite></footer>
            </blockquote>
         @else
            <blockquote class="blockquote text-right mt-4">
            <p class="mb-0">Contáctenos para mas información al número.</p>
            <footer class="blockquote-footer">{{ $restaurant->phone }} <cite title="Source Title">Colombia</cite></footer>
            </blockquote>
         @endif
      <blockquote class="blockquote mt-4">
         <p class="mb-0">Horarios de Atencion.</p>
         <footer class="blockquote-footer">{{ $restaurant->schedule ?? "sin agenda definida" }}</footer>
      </blockquote>
      <blockquote class="blockquote text-right mt-4">
         <p class="mb-0">Nuestra Ubicación</p>
      </blockquote>
      <div class="mb mt-2 mb-3">
         <div id="mapa" style="width: 100%; height: 500px;">    
         </div>
     </div>
      <script>
         function iniciarMapa(){
            var latitude = {{ $restaurant->latitude }};
            var longitude = {{ $restaurant->longitude }};

             coordenadas = {
                 lng: longitude,
                 lat: latitude
             }

             generarMapa(coordenadas);
         }

         function generarMapa(coordenadas){
             var mapa = new google.maps.Map(document.getElementById('mapa'),{
                 zoom: 12,
                 center: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
             })

             marcador = new google.maps.Marker({
                 map: mapa,
                 draggable: true,
                 position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
             })

             marcador.addListener('dragend', function(event){
                 document.getElementById('latitude').value = this.getPosition().lat();
                 document.getElementById('longitude').value = this.getPosition().lng();
             })
         }
     </script>
     <script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMapa"></script>
   </div>
   
   <div class="jumbotron mt-3">
      <h1 class="display-4">Seccion de cometarios</h1>
      <p class="lead">Aqui puedes ver los comentarios de nuestros clientes, tu tambien puedes dejar el tuyo.</p>
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

         @if (Auth::guest())
         
         <div class="alert alert-success" role="alert">
            Debe estar logeado para hacer comentarios
         </div>
         
            @foreach($restaurant->comments as $comment)
               <div class="row">
                  <div class="col-md-1">
                     <strong>{{ $comment->user->name }}:</strong>
                  </div>
                  <div class='col-md-6 ml-3'>
                     {{ $comment->comment }}
                  </div>
                  <i>Puntuacion: {{$comment->score}}</i>
                  <i class="ml-5 text-muted">{{$comment->created_at->diffForHumans()}}</i>
            </div>
            <hr />
            @endforeach
         @else

            {{ Form::open([ 'route' => ['comments.storec', $restaurant->id ], 'method' => 'post' ]) }}
                  @include('restaurants.form_comments')

                  {{ Form::submit('Publicar', ['class' => 'btn btn-primary mt-2 mb-5']); }}
            {!! Form::close() !!}

            @foreach($restaurant->comments as $comment)
               <div class="row">
                  <div class="col-md-1">
                     <strong>{{ $comment->user->name }}:</strong>
                  </div>
                  <div class='col-md-6 ml-3'>
                     {{ $comment->comment }}
                  </div>
                  <i>Puntuacion: {{$comment->score}}</i>
                  <i class="ml-5 text-muted">{{$comment->created_at->diffForHumans()}}</i>
            </div>
            <hr />
            @endforeach
        @endif

    </div>
</div>
@endsection