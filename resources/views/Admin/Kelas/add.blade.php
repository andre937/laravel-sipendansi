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
                            <li><a href="{{ route('Admin.Kelas.kelas')}}">Kelas</a></li>
                            <li class="active">Tambah Siswa</li>
                        </ol>
                    </div>
                </div>
            </div>
</div>
@endsection
@section('content')
<div class="row">
<form action="{{ route('guru.tambah') }}" method="post" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-6 small">
        <div class="form-group">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label font-weight-bold">NISN</label>
                <div class="col-sm-9">
                <input type="text" name="nisn" value="{{ old('nisn') ?? $siswa->nisn }}" class="form-control form-control-sm @error('nisn') is-invalid @enderror" placeholder="...">
                        
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label font-weight-bold">Nama Siswa</label>
                <div class="col-sm-9">
                    <input type="text" name="nama" value="{{ old('nama') ?? $siswa->nama }}" class="form-control form-control-sm @error('nama') is-invalid @enderror" placeholder="...">
                        @error('nama')
                        <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-3 col-form-label font-weight-bold">Kelas</label>
                <div class="col-sm-9">
                <select name="kelas" class="form-control @error('kelas') is-invalid @enderror">
                        @foreach($kelases as $kelas)
                            <option {{ $kelas->id == $siswa->kelas_id ? 'selected' : '' }} value=" {{ $kelas->id  }} ">{{ $kelas->kelas }}</option>
                        @endforeach
                    </select>
                        @error('kelas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 small">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label font-weight-bold">Semester</label>
                <div class="col-sm-9">
                    <select name="semester" value="{{ old('semester') ?? $siswa->semester }}" class="form-control @error('semester') is-invalid @enderror">
                        <option disabled selected>- Pilih -</option>
                        <option value="Semester 1"
                            @if ($siswa->semester == 'Semester 1')
                                selected
                            @endif
                        >Semester 1</option>
                        <option value="Semester 2"
                            @if ($siswa->semester == 'Semester 2')
                                selected
                            @endif
                        >Semester 2</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label font-weight-bold">Status</label>
                <div class="col-sm-9">
                    <select name="status" value="{{ old('status') ?? $siswa->status }}" class="form-control @error('status') is-invalid @enderror">
                        <option value="">- Pilih -</option>
                        <option value="Aktif"
                            @if ($siswa->status == 'Aktif')
                                selected
                            @endif
                        >Aktif</option>
                        <option value="Tidak Aktif"
                            @if ($siswa->status == 'Tidak Aktif')
                                selected
                            @endif
                        >Tidak Aktif</option>
                    </select>
                </div>
            </div>
                    <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{$submit ?? 'Create'}}</button>
                    </div>
                </div>
                </div>
    @endsection