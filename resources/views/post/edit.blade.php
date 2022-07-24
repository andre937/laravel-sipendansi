@extends('Admin.Menu.admin')
@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Siswa</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Beranda</a></li>
                            <li><a href="{{ route('Admin.Siswa.siswa')}}">Siswa</a></li>
                            <li class="active">Tambah Siswa</li>
                        </ol>
                    </div>
                </div>
            </div>
</div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-dark">
                <h6 class="m-0 font-weight-bold text-white">Form Edit Siswa</h6>
            </div>
            <div class="card-body">
                    <form action="/Admin/{{ $siswa->slug }}/edit" method="post">
                        @method('patch')
                        @csrf
                        @include('post.form.crud')
                    </form>
            </div>
        </div>
        </div>
@stop