@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

  		<div class="col-md-10">
  			<h1>All Users</h1>
  		</div>

  		<div class="col-md-2">
        <a href="{{route('users.create')}}" class='btn btn-lg btn-block btn-dark'>New User</a>
  		</div>

  		<div class="col-md-12">
  			<hr>
  		</div>

	 </div> <!-- end of .row -->


   <div class="row">
     <div class="col-md-12">
			<table class="table">
        <thead>
        	<th>#</th>
        	<th>name</th>
        	<th>email</th>
        	<th>role</th>
        	<th></th>
          <th></th>
        </thead>

        <tbody>
        	@foreach($users as $user)

        	<tr>
        		<th>{{ $user->id}}</th>
        		<th>{{ $user->name}}</th>
        		<th>{{ $user->email}}</th>
            <th>
              @foreach ($user->roles as $role)
                <span style="color:green">{{ $role->name }}, </span>
              @endforeach
            </th>

            @if (Auth::user()->can('isRole','admin') || Auth::user()->can('isRole','superadmin') )
              <th>
                <a href="{{route('users.show',$user->id)}}" class="btn btn-sm btn-dark">View</a>
                <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-primary">Edit</a>

              </th>

              <th>
                <a href="" class="btn btn-sm btn-primary">Edit Horari</a>
              </th>

              <th>

                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
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
        {!! $users->links(); !!}

      </div>

		</div>
  </div> <!-- end of .row -->



</div>
@endsection
