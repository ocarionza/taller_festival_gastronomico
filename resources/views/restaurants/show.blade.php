@extends('layouts.app')

@section('content')

<div class="container">

<h3>
  <small class="text-muted">Restaurante</small>
  {{ $restaurant -> name }}
</h3>

 Servimos en {{ $restaurant->city }} en el horario de {{ $restaurant->schedule ?? "sin agenda definida" }}.<br>

 @if($restaurant->delivery == 'y')
    Tenemos domicilios al número {{ $restaurant->phone }}.<br>
 @else
    Contáctenos para mas información al número {{ $restaurant->phone }}.<br>
 @endif

   <div class="btn-group" role="group" aria-label="Basic example">
      <a class="btn btn-warning mt-3" href="{{ route('restaurants.edit', $restaurant->id) }}">Editar</a>

      {{ Form::open(['route' => [
         'restaurants.destroy', $restaurant->id], 
         'method' => 'delete',
         'onsubmit' => 'return confirm(\'¿Esta seguro que desea remover el restaurante?\n¡Esta acción no se puede deshacer!\')'
      ]) }}
      <button type="submit" class="btn btn-danger mt-3">Remover</button>
      {!! Form::close() !!}
   </div>
</div>

@endsection