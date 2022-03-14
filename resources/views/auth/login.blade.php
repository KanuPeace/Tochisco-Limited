@extends('layouts.app', ['title' => 'Login' , 'activePage' => 'login'])

@section('content')
    
    <div class="container">
        <div class="logo text-center">
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12"
             style=" background-image: url('web_assets/img/New/tochisco.jpg');  min-height: 300px; background-position: center;  background-repeat: no-repeat;
             background-size: cover;
             position: relative;
             border-radius: 20px;">
                <div id="bg-img"></div>
            </div>
 
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="jumbotron" style="border-radius: 20px; height: 400px; mt-10%">
                    <div class="card">
                        <div class="card-header"><b>{{ __('Login') }}</b></div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">`
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right"><b>{{ __('E-Mail Address') }}</b></label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right"><b>{{ __('Password') }}</b></label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                <b>{{ __('Remember Me') }}</b>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

            
        </div>

    </div>
@endsection
