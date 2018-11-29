@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">

  		<div class="col-md-10">
  			<h1>All Clients</h1>
  		</div>
      @if (Auth::user()->can('isRole','superadmin') )

    		<div class="col-md-2">
          <a href="{{route('clients.create')}}" class='btn btn-lg btn-block btn-dark'>New Client</a>
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
        	<th>DNI</th>
        	<th>Name</th>
        	<th>Contact Telephone </th>
        	<th>Email</th>
        	<th></th>
          <th></th>
        </thead>

        <tbody>
        	@foreach($clients as $client)

        	<tr>
        		<th>{{ $client->dni }}</th>
        		<th>{{ $client->name }}</th>
        		<th>{{ $client->contact_telephone }}</th>
            <th>{{ $client->email }}</th>


            @if (Auth::user()->can('isRole','admin') || Auth::user()->can('isRole','superadmin') )
              <th>
                <a href="{{route('clients.show',$client->dni)}}" class="btn btn-sm btn-dark">View</a>
                <a href="{{route('clients.edit',$client->dni)}}" class="btn btn-sm btn-primary">Edit</a>

              </th>

              <th>

                <form action="{{ route('clients.destroy',$client->dni) }}" method="POST">
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
        {!! $clients->links(); !!}

      </div>

		</div>
  </div> <!-- end of .row -->



</div>
@endsection
