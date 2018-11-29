@extends('layouts.app')

@section('title',"Gestió d'usuaris")

@section('content')





  @can('create-user',App\User::class )
  <div class="btn-group" >
    <a href="{{ route('user.create') }}" class="btn btn-info btn-dark" >Afegir usuari</a>
  </div>
  @endcan

  <div class="table-container">

    <table id="mytable" class="table table-bordred table-striped">
      <thead>
        <th>Dni</th>
        <th>Name</th>
        <th>Email</th>
        <th>Rol</th>
      @can('read_horari-user',App\User::class )
        <th>Horari</th>
      @endcan
      @can('read_sector-user',App\User::class )
        <th>Sectors</th>
      @endcan
      @can('update-user',App\User::class )
        <th>Editar Usuari</th>
      @endcan
      @can('delete-user',App\User::class )
        <th>Eliminar Usuari</th>
      @endcan
      </thead>
      <tbody>
      @if($users->count())
      @foreach($users as $user)
      <tr>
        <td>{{$user->dni}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        @foreach($user->roles as $rol )
        <td>{{$rol->name}}</td>
        @endforeach

        @can('read_horari-user',App\User::class )
        <td>

        <a class="btn btn-success btn-xs" href="{{action('UserController@horaris', $user->dni)}}" ></a>

        </td>
        @endcan
        @can('read_sector-user',App\User::class )
        <td>
        <a class="btn btn-success btn-xs" href="{{action('UserController@sectors', $user->dni)}}" ></a>

        </td>
        @endcan
        @can('update-user',App\User::class )
        <td><a class="btn btn-primary btn-xs" href="{{action('UserController@edit', $user->dni)}}" ></a></td>
        @endcan
        @can('delete-user',App\User::class )
        <td>

          <form action="{{action('UserController@destroy', $user->dni)}}" method="post">
            {{csrf_field()}}


            <input name="_method" type="hidden" value="DELETE">

            <button class="btn btn-danger btn-xs" type="submit"></button>
            </form>
        </td>
        @endcan
        </tr>
        @endforeach
        @else
        <tr>
        <td colspan="8">No hi han usuaris</td>
      </tr>
      @endif
    </tbody>

  </table>



  <div class="d-flex justify-content-center">


    {{ $users->links() }}

  </div>



</div>
@endsection
