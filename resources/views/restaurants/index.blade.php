@extends('layouts.app')

@section('content')

<div class="container">
    <table>

    @foreach ($restaurants as $restaurant)
        <tr>
            <td>{{ $restaurant->name }}</td>
            <td>{{ $restaurant->description }}</td>
        </tr>
    @endforeach

    </table>
</div>
@endsection