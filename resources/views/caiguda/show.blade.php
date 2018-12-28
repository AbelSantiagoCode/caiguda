@extends('layouts.app')

@section('content')

 @if($caigudes->count())

<div class="container">
<div class="alert alert-danger" role="alert">
<h1>! ! ! CAIGUDA ! ! ! </h1>
</div>
<br>


<table class="table">
  <thead>
    <th>DNI</th>
    <th>Nom</th>
    <th>Telèfon contacte</th>
    <th>Sector</th>
    <th>Assistit</th>
  </thead>
  <tbody>
  @foreach($caigudes as $caiguda)
    @php
      unset($horaris);
      $horaris = array(); 
    @endphp

    @foreach($caiguda->horaris->map->id->toArray() as $hor)
      @php
        array_push($horaris, $hor);
      @endphp
    @endforeach

    @if( count(array_intersect($horaris, $user->horaris->map->id->toArray()))==1 && in_array($caiguda->sector_id, $user->sectors->map->id->toArray()))
    <tr bgcolor="#FF0000">
    @else
    <tr>
    @endif

    <td>{{$caiguda->client_dni}}</td>
    <td>{{$caiguda->client->name}}</td>
    <td>{{$caiguda->client->contact_telephone}}</td>
    <td>{{$caiguda->sector_id}}</td>
    <td><a class="btn btn-info btn-xl" href="{{action('CaigudaController@assistit', $caiguda->id)}}" ></a></td>

  </tr>

  @endforeach

@else

No hi ha caigudes


@endif

  </tbody>
</table>
</div>



@endsection
