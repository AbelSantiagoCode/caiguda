@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

							<div class="card-header">
								{{ __('Edit Device : ') }}
							</div>

							<div class="card-body">

								<form action="{{ route('devices.update',$device->id) }}" method="POST">
									@csrf
									{{ method_field('PUT') }}

									<div class="form-group row">
											<label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Identifier') }}</label>

											<div class="col-md-6">
													<input id="id" type="number" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ $device->id}}" required autofocus>

													@if ($errors->has('id'))
															<span class="invalid-feedback" role="alert">
																	<strong>{{ $errors->first('id') }}</strong>
															</span>
													@endif
											</div>
									</div>

									<div class="form-group row {{ $errors->has('active') ? ' is-invalid' : '' }}">
											<label for="active" class="col-md-4 col-form-label text-md-right">{{ __('Active Device') }}</label>

											<div class="col-md-6">
													<select id="active" class="form-control" name="active" required>

														@if ($device->active == true)
															<option value="1" selected>True</option>
															<option value="0" >False</option>

														@else
															<option value="1" >True</option>
															<option value="0" selected>False</option>
														@endif
													</select>

													@if ($errors->has('active'))
															<span class="invalid-feedback" role="alert">
																	<strong>{{ $errors->first('active') }}</strong>
															</span>
													@endif
											</div>
									</div>

									<div class="form-group row {{ $errors->has('client_dni') ? ' has-error' : '' }}">
										<label for="client_dni" class="col-md-4 col-form-label text-md-right">Clients</label>

										<div class="col-md-6">
											<select id="client_dni" class="form-control" name="client_dni" required>
												<option value="{{$device->client->dni}}" selected>{{$device->client->dni}} : {{$device->client->name}}</option>

												@foreach($clients as $client)
													<option value="{{$client->dni}}">{{$client->dni}} : {{$client->name}}</option>
												@endforeach
											</select>

											@if ($errors->has('client_dni'))
												<span class="help-block">
													<strong>{{ $errors->first('client_dni') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group row {{ $errors->has('position_id') ? ' has-error' : '' }}">
										<label for="position_id" class="col-md-4 col-form-label text-md-right">Positions</label>

										<div class="col-md-6">
											<select id="position_id" class="form-control" name="position_id" required>
												@if ($device->position_id == NULL)
													<option value="{{NULL}}" selected>NULL</option>
												@else
													<option value="{{$device->position->id}}" selected>{{$device->position->id}} in Sector: {{$device->position->sector_id }}</option>
												@endif

												@foreach($positions as $position)
													<option value="{{$position->id}}">{{$position->id}} in Sector: {{$position->sector_id}} </option>
												@endforeach
											</select>

											@if ($errors->has('position_id'))
												<span class="help-block">
													<strong>{{ $errors->first('position_id') }}</strong>
												</span>
											@endif
										</div>
									</div>




									<div class="form-group row mb-0">
											<div class="col-md-6 offset-md-4">
													<button type="submit" class="btn btn-success">
															{{ __('Save') }}
													</button>

													<a href="{{route('devices.index')}}" class='btn btn-danger'>Cancel</a>
											</div>
									</div>



								</form>
							</div>



						</div>
				</div>
		</div>
	</div>

@endsection
