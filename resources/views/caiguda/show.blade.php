@extends('layouts.app')

@section('content')

 @if($caigudes->count())

<div class="container">
<div class="alert alert-danger" role="alert">
<h1>!!! ALERTA CAIGUDA !!! </h1>
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
  <tr>
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
