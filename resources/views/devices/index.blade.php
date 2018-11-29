@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">

  		<div class="col-md-10">
  			<h1>All Devices</h1>
  		</div>
      @if (Auth::user()->can('isRole','superadmin') )

    		<div class="col-md-2">
          <a href="{{route('devices.create')}}" class='btn btn-lg btn-block btn-dark'>New Device</a>
    		</div>
      @endif

  		<div class="col-md-12">
  			<hr>
  		</div>

	 </div> <!-- end of .row -->

   <div class="row">
     <div class="col-md-12">
			<table class="table">
        <thead>
        	<th>Identifier</th>
        	<th>Active</th>
        	<th>Client</th>
        	<th>Located at Position</th>
        	<th></th>
          <th></th>
        </thead>

        <tbody>
        	@foreach($devices as $device)

        	<tr>
        		<th>{{ $device->id}}</th>
        		<th>{{ $device->active}}</th>
        		<th>{{ $device->client_dni}}</th>
            <th>{{ $device->position_id}}</th>


            @if (Auth::user()->can('isRole','admin') || Auth::user()->can('isRole','superadmin') )
              <th>
                <a href="{{route('devices.show',$device->id)}}" class="btn btn-sm btn-dark">View</a>
                <a href="{{route('devices.edit',$device->id)}}" class="btn btn-sm btn-primary">Edit</a>

              </th>

              <th>

                <form action="{{ route('devices.destroy',$device->id) }}" method="POST">
                  @csrf

                  {{ method_field('DELETE') }}

                  <button type="submit" class="btn btn-danger btn-sm">
                    {{ __('Delete') }}
                  </button>
                </form>

              </th>
            @endif

        	</tr>

        	@endforeach

        </tbody>
      </table>
			<!-- THIS PIECE OF CODE REPRESENTS THE PAGINATION-->
      <div class="d-flex justify-content-center">
        {!! $devices->links(); !!}

      </div>

		</div>
  </div> <!-- end of .row -->



</div>
@endsection
