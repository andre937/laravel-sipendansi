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
                <h6 class="m-0 font-weight-bold text-white">Form Tambah Pelajaran</h6>
            </div>
            <div class="card-body">
                    <form action="/tambah/{{ $siswa->slug }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label>Nama Pelajaran</label>
                            <select name="pelajarans[]" id="pelajarans" class="form-control @error('pelajaran') is-invalid @enderror" multiple>
                        @foreach($siswa->pelajarans as $pelajaran)
                            <option selected value="{{ $pelajaran->id }}">{{ $pelajaran->pelajaran }}</option>
                        @endforeach
                        @foreach($pelajarans as $pelajaran)
                            <option value=" {{ $pelajaran->id }} ">{{ $pelajaran->pelajaran }}</option>
                        @endforeach
                    </select>
                        @error('pelajarans')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                    <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{$submit ?? 'Update'}}</button>
                    </div>
                    </form>
                </div>
            </div>
      </div>
</div>

<div class="form-group row">
                <label class="col-sm-3 col-form-label font-weight-bold">Pelajaran</label>
                <div class="col-sm-9">
                    <select name="pelajarans[]" id="pelajarans" class="form-control @error('pelajaran') is-invalid @enderror" multiple>
                        @foreach($siswa->pelajarans as $pelajaran)
                            <option selected value="{{ $pelajaran->id }}">{{ $pelajaran->pelajaran }}</option>
                        @endforeach
                        @foreach($pelajarans as $pelajaran)
                            <option value=" {{ $pelajaran->id }} ">{{ $pelajaran->pelajaran }}</option>
                        @endforeach
                    </select>
                        @error('pelajarans')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
            </div>