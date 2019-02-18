@extends('auth.templates.template')

@section('content')

<form class="login form" method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group row">
        <div class="col-md-12">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-12 offset-md-12">
            <button type="submit" class="btn btn-login">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="recuperar" href="{{ route('password.request') }}">Recuperar senha?</a>
            @endif
            <div class="form-check" >
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><label class="form-check-label recuperar" style="margin-left: -10px;" for="remember">Lembre-me</label>
            </div>
        </div>
    </div>
</form>
@endsection
