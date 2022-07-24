@extends('layouts.app')

@section('content')
<div class="container">
<br>
    <div class="row" style="margin-top: 60px;">
        <div>
        <h2 class="mt-5 text-center">Sistem Pengelolaan Data Nilai Siswa</h2>
        <img src="{{ asset('img/ds.png')}}" class="mx-auto d-block mb-3" width="170px">
            <h1 class="text-center"><strong>SD Negeri Setu 2</strong></h1>
            <br>
                <!--<a class="col-md-3 btn btn-outline-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="col-md-3 btn btn-outline-dark" href="{{ route('register') }}">{{ __('Register') }}</a>-->
        </div>
        <div class="col-md-6 mt-5 ml-auto">
            <div class="card">
                <div class="card-header bg-dark text-white">
                {{ __('Login') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="no_induk" class="col-md-4 col-form-label text-md-right">No Induk</label>

                            <div class="col-md-6">
                                <input id="no_induk" type="text" class="form-control @error('no_induk') is-invalid @enderror" name="no_induk" value="{{ old('no_induk') }}" required autocomplete="no_induk" autofocus>

                                @error('no_induk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-input" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <checkbox id="toggle-password"></checkbox>
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
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<script>
    const passwordInput = document.querySelector("#password-input");
    const togglePasswordButton = document.querySelector("#toggle-password");

    togglePasswordButton.addEventListener("click", () => {
        if (passwordInput.type === "password"){
            passwordInput.type = "text";
        } else if (passwordInput.type === "text"){
            passwordInput.type = "password";
        }
    });
</script>-->
@endsection
