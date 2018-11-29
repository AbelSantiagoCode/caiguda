@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">


    <div class="col">
      <p class="lead">Identifier: {{ $device->id }}</p>
    </div>

    <div class="col">
      <p class="lead">Active: {{ $device->active }}</p>
    </div>

    <div class="col">
      <a href="{{route('devices.index')}}" class="btn btn-primary"> All Devices </a>
    </div>
  </div>



  <div class="row">
    <div class="col">
      <p class="lead">Client associated: {{$device->client->dni }} - {{ $device->client->name }}</p>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <p class="lead">Located at Position: {{ $device->position_id }}</p>
    </div>
  </div>

</div>


@endsection
