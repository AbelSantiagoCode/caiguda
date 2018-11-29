@extends('layouts.app')

@section('title',$user->name . " - sectors")

@section('content')




@php

$sectors_all=App\Sector::all()->map->id;
$sectors_arr=$user->sectors->map->id->toArray();

@endphp


<h5>Sectors no assignats</h5>
<form method="POST" action="{{ route('sector.attach') }}"  role="form">
      {{ csrf_field() }}


      <div class="form-group">
            <input type="hidden" name="dni" id="dni" class="form-control input-sm" value="{{$user->dni}}">
        </div>

      <div class="row">


        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
        
          
            <select name="sectors[]" id="chkveg" multiple="multiple">
                @foreach($sectors_all as $sector_all)
                  @if(in_array($sector_all, $sectors_arr))
                  @else
                  <option value="{{$sector_all}}">{{$sector_all}}</option>
                  @endif
                @endforeach

            </select>


          </div>
        </div>
      </div>
    
      
      <div class="row">

        <div class="col-xs-2 col-xs-2 col-xs-2">
          <input type="submit"  value="Afegir Sector" class="btn btn-info btn-block">
        </div>	

      </div>
					
</form>


<br>


<script type="text/javascript">

$(function() {

    $('#chkveg').multiselect({

        includeSelectAllOption: true
    });

    $('#btnget').click(function(){

        alert($('#chkveg').val());
    });
});

</script>


  
  <div class="table-container">

    <table id="mytable" class="table table-bordred table-striped">
      <thead>
        <th>Identificador Sector</th>
        <th>Desassigar Sector</th>
      </thead>
      <tbody>
      @if($sectors->count())  
      @foreach($sectors as $sector)  
      <tr>

        <td>{{$sector->id}}</td>
                    
        <td>

          <form action="{{action('SectorController@detach')}}" method="post" role="form">
            {{csrf_field()}}
           
            <input type="hidden" name="dni" id="dni" class="form-control input-sm" value="{{$user->dni}}">
            <input type="hidden" name="id" id="id" class="form-control input-sm" value="{{$sector->id}}">
						
            <button class="btn btn-danger btn-xs" type="submit"></button>
        </form>
        </td> 

        </tr>
        @endforeach 
        @else
        <tr>
        <td colspan="8">No hi han sectors assignats</td>
      </tr>
      @endif
    </tbody>

  </table>


{{ $sectors->links() }}



</div>
@endsection