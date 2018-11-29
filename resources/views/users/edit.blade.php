@extends('layouts.app')

@section('content')
	<div class="container">

		<div class="row">
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link active" href="#edit" role="tab" data-toggle="tab">Edit</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#password" role="tab" data-toggle="tab">Reset Password</a>

				</li>
			</ul>
		</div>

		<div class="row">

			<div  class="tab-content ">
				<div id="edit" role="tabpane1" class="tab-pane active">
					<form action="{{ route('users.update',$user->id) }}" method="POST">
						@csrf
						{{ method_field('PUT') }}

						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

								@if ($errors->has('name'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

								@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>


						@can('isRole',"superadmin")
								<div class="form-group row {{ $errors->has('role') ? ' has-error' : '' }}">
									<label for="role" class="col-md-4 col-form-label text-md-right">User role</label>

									<div class="col-md-6">
										<select id="role" class="form-control" name="role" required>
											@foreach ($user->roles as $role)
												<option value="{{$role->id}}" selected>{{$role->name}}</option>
											@endforeach

											@foreach($roles as $id => $role)
												<option value="{{$id}}">{{$role}}</option>
											@endforeach
										</select>

										@if ($errors->has('role'))
											<span class="help-block">
												<strong>{{ $errors->first('role') }}</strong>
											</span>
										@endif
									</div>
								</div>
						@endcan


						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-success">
									{{ __('Save') }}
								</button>

								<a href="{{route('users.index')}}" class='btn btn-danger'>Cancel</a>
							</div>
						</div>
					</form>

				</div>

				<div id="password" role="tabpane1" class="tab-pane">
					<form action="{{ route('users.update',$user->id) }}" method="POST">
						@csrf
						{{ method_field('PUT') }}

						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

								@if ($errors->has('name'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

								@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="password"  class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

							<div class="col-md-6">
								<input id="password" placeholder="*******" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

								@if ($errors->has('password'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

							<div class="col-md-6">
								<input id="password-confirm" placeholder="*******"  type="password" class="form-control" name="password_confirmation" required>
							</div>
						</div>


						@can('isRole',"superadmin")
								<div class="form-group row {{ $errors->has('role') ? ' has-error' : '' }}">
									<label for="role" class="col-md-4 col-form-label text-md-right">User role</label>

									<div class="col-md-6">
										<select id="role" class="form-control" name="role" required>
											@foreach ($user->roles as $role)
												<option value="{{$role->id}}" selected>{{$role->name}}</option>
											@endforeach

											@foreach($roles as $id => $role)
												<option value="{{$id}}">{{$role}}</option>
											@endforeach
										</select>

										@if ($errors->has('role'))
											<span class="help-block">
												<strong>{{ $errors->first('role') }}</strong>
											</span>
										@endif
									</div>
								</div>
						@endcan

						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-success">
									{{ __('Save') }}
								</button>

								<a href="{{route('users.index')}}" class='btn btn-danger'>Cancel</a>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div> <!-- end of .row(form) -->
	</div>



@endsection
