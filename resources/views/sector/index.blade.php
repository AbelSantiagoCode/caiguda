@extends('layouts.app')

@section('title',"Gestió Sectors")

@section('content')





  @can('create-sector',App\Sectors::class )
  <div class="btn-group" >
    <a href="{{ route('sector.create') }}" class="btn btn-info btn-dark" >Afegir Sector</a>
  </div>
  @endcan

  <div class="table-container">

    <table id="mytable" class="table table-bordred table-striped">
      <thead>
        <th>Identificador Sector</th>
        @can('update-sector',App\Sectors::class )
        <th>Editar Sector</th>
        @endcan
        @can('delete-sector',App\Sectors::class )
        <th>Eliminar Sector</th>
        @endcan
      </thead>
      <tbody>
      @if($sectors->count())
      @foreach($sectors as $sector)
      <tr>


        <td>{{$sector->id}}</td>
        @can('update-sector',App\Sectors::class )
        <td><a class="btn btn-primary btn-xs" href="{{action('SectorController@edit', $sector->id)}}" ></a></td>
        @endcan
        @can('delete-sector',App\Sectors::class )
        <td>

          <form action="{{action('SectorController@destroy', $sector->id)}}" method="post">
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
        <td colspan="8">No hi han sectors</td>
      </tr>
      @endif
    </tbody>

  </table>


  <div class="d-flex justify-content-center">

    {{ $sectors->links() }}

  </div>




</div>
@endsection
