@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
      <h2>Work:</h2>
      <p class="lead" >
        @foreach ($user->roles as $role)
            {{ $role->name }}
        @endforeach
      </p>
    </div>

    <div class="col">
      <p class="lead">Name: {{ $user->name }}</p>
    </div>

    <div class="col">
      <p class="lead">Email: {{ $user->email }}</p>
    </div>

    <div class="col">
      <a href="{{route('users.index')}}" class="btn btn-primary"> All Users </a>
    </div>
  </div>



  <div class="row">
    <br></br>
    <h1>Showw here his/here zones of work</h1>
  </div>

  <div class="row">
    <h1>Showw here his/here schedule</h1>
  </div>

</div>


@endsection
