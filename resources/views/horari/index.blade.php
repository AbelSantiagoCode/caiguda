@extends('layouts.app')

@section('title',"Gestió Horari")

@section('content')





  @can('create-horari',App\Horari::class )
  <div class="btn-group" >
    <a href="{{ route('horari.create') }}" class="btn btn-info btn-dark" >Afegir horari</a>
  </div>
  @endcan

  <div class="table-container">

    <table id="mytable" class="table table-bordred table-striped">
      <thead>
        <th>Dia</th>
        <th>Inici</th>
        <th>Final</th>
        @can('update-horari',App\Horari::class )
        <th>Editar Franja</th>
        @endcan
        @can('delete-horari',App\Horari::class )
        <th>Eliminar Franja</th>
        @endcan
      </thead>
      <tbody>
      @if($horaris->count())
      @foreach($horaris as $horari)
      <tr>

        <td>{{$horari->day}}</td>
        <td>{{$horari->start}}</td>
        <td>{{$horari->finish}}</td>
        @can('update-horari',App\Horari::class )
        <td><a class="btn btn-primary btn-xs" href="{{action('HorariController@edit', $horari->id)}}" ></a></td>
        @endcan
        @can('delete-horari',App\Horari::class )
        <td>

          <form action="{{action('HorariController@destroy', $horari->id)}}" method="post">
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
        <td colspan="8">No hi han franjes horaries</td>
      </tr>
      @endif
    </tbody>

  </table>


  <div class="d-flex justify-content-center">

    {{ $horaris->links() }}

  </div>




</div>
@endsection
