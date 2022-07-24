@extends('Admin.Menu.admin')
@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Kelas</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Beranda</a></li>
                            <li><a href="{{ route('Admin.Kelas.kelas')}}">Kelas</a></li>
                            <li class="active">Tambah Kelas</li>
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
                <h6 class="m-0 font-weight-bold text-white">Form Tambah Kelas</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('kelas.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @include('Admin.Kelas.buat',['submit' => 'Create'])
                </form>
            </div>
        </div>
    </div>
@stop