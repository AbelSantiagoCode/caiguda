@extends('layouts.app')

@section('title',$user->name . " - horaris")

@section('content')




@can('create_horari-user',App\User::class )
<h5>Horaris no assignats</h5>
<form method="POST" action="{{ route('user.update', $user->dni) }}"  role="form">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
 
    <div class="row">


      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
      
        
          <select name="horaris[]" id="chkveg" multiple="multiple">
              @foreach($horaris_all as $horari_all)
                @if(in_array($horari_all, $user->horaris->map->id->toArray()))
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

@endcan

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
        @can('delete_horari-user',App\User::class )
        <th>Desassingar horari</th>
        @endcan
      </thead>
      <tbody>
      @if($horaris->count())  
      @foreach($horaris as $horari)  
      <tr>

        <td>{{$horari->day}}</td>
        <td>{{$horari->start}}</td>
        <td>{{$horari->finish}}</td>
        @can('delete_horari-user',App\User::class )
        <td>
        <form action="{{route('user.update', $user->dni)}}" method="POST" role="form">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
          
            <input type="hidden" name="detach_horari" id="dni" class="form-control input-sm" value="{{true}}">
            <input type="hidden" name="horaris" id="id" class="form-control input-sm" value="{{$horari->id}}">
         
            <button class="btn btn-danger btn-xs" type="submit"></button>
          
        </form>
     
        </td>
        @endcan

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