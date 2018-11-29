@extends('layouts.app')

@section('title',$user->name . " - horaris")

@section('content')



@php

$horaris_all=App\Horari::all()->map->id;
$horaris_arr=$user->horaris->map->id->toArray();

@endphp
  



<h5>Horaris no assignats</h5>
<form method="POST" action="{{ route('horari.attach') }}"  role="form">
    {{ csrf_field() }}


    <div class="form-group">
          <input type="hidden" name="dni" id="dni" class="form-control input-sm" value="{{$user->dni}}">
      </div>

    <div class="row">


      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
      
        
          <select name="horaris[]" id="chkveg" multiple="multiple">
              @foreach($horaris_all as $horari_all)
                @if(in_array($horari_all, $horaris_arr))
                @else

                <option value="{{$horari_all}}">{{App\Horari::find($horari_all)->day}} : {{App\Horari::find($horari_all)->start}} - {{App\Horari::find($horari_all)->finish}}</option>
                @endif
              @endforeach

          </select>


        </div>
      </div>
    </div>
  
    
    <div class="row">

      <div class="col-xs-2 col-xs-2 col-xs-2">
        <input type="submit"  value="Afegir horari" class="btn btn-info btn-block">
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
        <th>Dia</th>
        <th>Inici</th>
        <th>Final</th>
        <th>Desassingar horari</th>
      </thead>
      <tbody>
      @if($horaris->count())  
      @foreach($horaris as $horari)  
      <tr>

        <td>{{$horari->day}}</td>
        <td>{{$horari->start}}</td>
        <td>{{$horari->finish}}</td>
                    
        <td>

          <form action="{{action('HorariController@detach')}}" method="post" role="form">
            {{csrf_field()}}
          
            <input type="hidden" name="dni" id="dni" class="form-control input-sm" value="{{$user->dni}}">
            <input type="hidden" name="id" id="id" class="form-control input-sm" value="{{$horari->id}}">
				      
            <button class="btn btn-danger btn-xs" type="submit"></button>
        </form>
        </td> 

        </tr>
        @endforeach 
        @else
        <tr>
        <td colspan="8">No hi han horaris assignats</td>
      </tr>
      @endif
    </tbody>

  </table>


{{ $horaris->links() }}



</div>
@endsection