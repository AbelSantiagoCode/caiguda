@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">


    <div class="col">
      <p class="lead">DNI: {{ $client->dni }}</p>
    </div>

    <div class="col">
      <p class="lead">Name: {{ $client->name }}</p>
    </div>



    <div class="col">
      <a href="{{route('clients.index')}}" class="btn btn-primary"> All Clients </a>
    </div>
  </div>



  <div class="row">
    <div class="col">
      <p class="lead">Contact Telephone: {{ $client->contact_telephone }}</p>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <p class="lead">Email: {{ $client->email }}</p>
    </div>  </div>

</div>


@endsection
