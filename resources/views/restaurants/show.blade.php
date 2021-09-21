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

</div>

@endsection