@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mt-5">
                <h1><i class="mdi mdi-account-group"></i></h1>
                <p>Authenticate yourself</p>
            </div>
            <div class="mt-4"></div>

            <div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">

                        <div class="col-md-6 offset-3">
                            <input id="email" type="email" placeholder="Email address.." class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-6 offset-3">
                            <input id="password" type="password" placeholder="Your password.." class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
