@extends('layouts.app')

@section('title',$user->name . " - sectors")

@section('content')




@can('create_sector-user',App\User::class )
<h5>Sectors no assignats</h5>
<form method="POST" action="{{ route('user.update',$user->dni) }}"  role="form">
      {{ csrf_field() }}
      {{ method_field('PATCH') }}

      <div class="row">


        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
        
          
            <select name="sectors[]" id="chkveg" multiple="multiple">
                @foreach($sectors_all as $sector_all)
                  @if(in_array($sector_all, $user->sectors->map->id->toArray()))
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
        <th>Identificador Sector</th>

      @can('delete_sector-user',App\User::class )
        <th>Desassigar Sector</th>
      @endcan
      </thead>
      <tbody>
      @if($sectors->count())  
      @foreach($sectors as $sector)  
      <tr>

        <td>{{$sector->id}}</td>

        @can('delete_sector-user',App\User::class )     
        <td>
        <form action="{{ route('user.update', $user->dni)}}" method="POST" role="form">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
           
            <input type="hidden" name="detach_sector" id="dni" class="form-control input-sm" value="{{true}}">
            <input type="hidden" name="sectors" id="id" class="form-control input-sm" value="{{$sector->id}}">
						
            <button class="btn btn-danger btn-xs" type="submit"></button>
        </form>

        
        </td> 
        @endcan
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