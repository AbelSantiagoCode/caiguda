@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  {{ __('Create Client : ') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route( 'clients.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>

                            <div class="col-md-6">
                                <input id="dni" type="text" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="dni" value="{{ old('dni') }}" required autofocus>

                                @if ($errors->has('dni'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="contact_telephone" class="col-md-4 col-form-label text-md-right">{{ __('Contact Telephone') }}</label>

                            <div class="col-md-6">
                                <input id="contact_telephone" type="number" class="form-control{{ $errors->has('contact_telephone') ? ' is-invalid' : '' }}" name="contact_telephone" value="{{ old('contact_telephone') }}" required autofocus>

                                @if ($errors->has('contact_telephone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact_telephone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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
