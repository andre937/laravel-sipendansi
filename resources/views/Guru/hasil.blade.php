@extends('Guru.id_kelas')
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
                            <li><a href="{{ route('Guru.siswa')}}">Siswa</a></li>
                            <li class="active">Nilai</li>
                        </ol>
                    </div>
                </div>
            </div>
</div>
@endsection
@section('content')
    
@endsection