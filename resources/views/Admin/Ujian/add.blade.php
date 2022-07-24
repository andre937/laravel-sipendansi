
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
                            <li><a href="{{ route('Admin.Ujian.ujian')}}">Ujian</a></li>
                            <li class="active">Tambah Ujian</li>
                        </ol>
                    </div>
                </div>
            </div>
</div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card">
        @include('Admin.alert')
            <div class="card-header bg-dark">
                <h6 class="m-0 font-weight-bold text-white">Form Tambah Nama Ujian</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('post.ujian') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12 small">
                        <div class="form-group">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label font-weight-bold">NISN</label>
                                <div class="col-sm-9">
                                    <select name="nisn" value="{{ old('nisn') ?? $ujian->nisn }}" class="form-control @error('nisn') is-invalid @enderror js-example-basic-single form-control">
                                    <option disabled selected>- Pilih -</option>
                                        @foreach($siswas as $siswa)
                                        <option {{ $siswa->id == $ujian->siswa_id ? 'selected' : '' }} value=" {{ $siswa->id }}">{{ $siswa->nisn}} - {{ $siswa->nama }} - {{ $siswa->kelas->kelas }}</option>
                                        @endforeach
                                    </select>
                                        @error('nisn')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label font-weight-bold">Nama Pelajaran</label>
                                <div class="col-sm-9">
                                <select name="pelajaran" value="{{ old('pelajaran') ?? $ujian->pelajaran }}" class="form-control select2 @error('pelajaran') is-invalid @enderror">
                                        <option disabled selected>- Pilih -</option>
                                            @foreach($pelajarans as $pelajaran)
                                                <option {{ $pelajaran->id == $ujian->pelajaran_id ? 'selected' : '' }} value=" {{ $pelajaran->id }} ">{{ $pelajaran->pelajaran}}</option>
                                            @endforeach
                                        </select>
                                            @error('pelajaran')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label font-weight-bold">Nama Ujian</label>
                                <div class="col-sm-9">
                                    <select name="nama_ujian" value="{{ old('nama_ujian') ?? $ujian->nama_ujian }}" class="form-control @error('nama_ujian') is-invalid @enderror">
                                        <option disabled selected>- Pilih -</option>
                                        <option value="Ujian Tengah Semester (UTS)"
                                            @if ($ujian->nama_ujian == 'Ujian Tengah Semester (UTS)')
                                                selected
                                            @endif
                                        >Ujian Tengah Semester (UTS)</option>
                                        <option value="Ujian Akhir Semester (UAS)"
                                            @if ($siswa->nama_ujian == 'Ujian Akhir Semester (UAS)')
                                                selected
                                            @endif
                                        >Ujian Akhir Semester (UAS)</option>
                                    </select>
                                            @error('nama_ujian')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                    <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{$submit ?? 'Create'}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection