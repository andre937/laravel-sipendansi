<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('style/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                margin: 0;
            }
        </style>
    </head>
    <body>
          <div class="card">
            <div class="card-body text-center bg-info">
              <div class="jumbotron jumbotron-fluid">
                <h1 class="display-4">Sistem Pengelolaan Data Nilai Siswa</h1>
                <p class="lead">Sekolah Dasar Negeri Setu 2</p>
                <hr class="my-4">
                <img src="{{ asset('img/ds.png')}}" class="mb-3" width="200px">
                <p>Silahkan Login Terlebih Dahulu Untuk Melanjutkan</p>
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a class="btn btn-success" href="{{ route('Admin.Dashboard') }}">HOME</a>
                            @else
                                <a class="btn btn-success" href="{{ route('login') }}">LOGIN</a>

                                <!-- @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif -->
                            @endauth
                        </div>
                    @endif
            </div>
          </div>
        </div>
    </body>
</html>
