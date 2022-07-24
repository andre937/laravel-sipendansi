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
                            <li class="active">Siswa</li>
                        </ol>
                    </div>
                </div>
            </div>
</div>
@endsection
@section('content')
<div class="middle">
      <div class="menu col-sm-12">
        <li class="item" id='profile'>
          <a href="#profile" class="btr"><i class="fa fa-user"></i>Profile</a>
          <div class="smenu col-sm-12">
                <div class="card mt-3 mb-5" style="border-top: 3px solid rgb(247, 6, 6);">
                    <div class="card-header bg-dark text-white">
                        <i class="fas fa-user-alt"></i><strong> Profile Identitas Peserta Didik</strong> <small> </small>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-sm-8 small">
                                <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Nama Peserta Didik</td>
                                            <td>:</td>
                                            <td class="font-weight-bold">{{ $siswa->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>NISN</td>
                                            <td>:</td>
                                            <td class="font-weight-bold">{{ $siswa->nisn }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kelas</td>
                                            <td>:</td>
                                            <td>{{ $siswa->kelas->kelas }}</td>
                                        </tr>
                                        <tr>
                                            <td>Semester</td>
                                            <td>:</td>
                                            @if($siswa->semester == 'Semester 1')
                                                        <td>Semester 1</td>
                                                    @else
                                                        <td>Semester 2</td>
                                                    @endif
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                                    @if($siswa->status == 'Aktif')
                                                    <td>Aktif</td>
                                                    @else
                                                    <td>Tidak Aktif</td>
                                                    @endif
                                        </tr>
                                        <tr>
                                            <td>Tahun Pelajaran</td>
                                            <td>:</td>
                                            <td>{{ $siswa->kelas->awal_tahun }} / {{ $siswa->kelas->akhir_tahun }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
          </div>
        </li>

        

        <li class="item" id="ujian">
          <a href="#ujian" class="btr"><i class="fa fa-tasks"></i>Nama Ujian</a>
          <div class="smenu col-sm-12">
                    <div class="mt-2">
                        @include('Admin.alert')
                    </div>
                              <table class="table table-striped table-sm" width="100%">
                                <thead class="thead-dark">
                                <tr>
                                  <th>No</th>
                                  <th>Pelajaran</th>
                                  <th>Ujian</th>
                                  <th>KD</th>
                                  <th>Nilai KD</th>
                                  <th>Opsi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $no=1;
                                ?>
                            @foreach($siswa->ujians as $ujian)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $ujian->pelajaran->pelajaran }}</td>
                                        <td>{{ $ujian->nama_ujian }}</td>
                                        <td>
                                            @foreach($ujian->nilais as $nilai)
                                                <p>{{ $nilai->kd ?? 'Belum Tersedia'}}</p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($ujian->nilais as $nilai)
                                                <p>{{ $nilai->pivot->nilai_kd ?? 'Belum Tersedia'}}</p>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="/hasil/{{ $ujian->id }}" class="btn btn-success btn-sm">Beri Nilai</a>
                                            <form action="{{ url('ujian/'.$ujian->id) }}" class="d-inline" method="post" onsubmit="return confirm('apakah anda ingin menghapusnya ?')">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                              @endforeach
                                </tbody>
                              </table>
                            <!-- /.col -->
          </div>
        </li>

        <li class="item" id="messages">
          <a href="#messages" class="btr"><i class="fa fa-plus-square-o"></i>Tambah Nama Ujian</a>
          <div class="smenu col-sm-12">
          <div class="card mt-3">
            <div class="card-header bg-dark">
                <h6 class="m-0 font-weight-bold text-white">Form Tambah Nama Ujian</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('get.ujian') }}" method="post" autocomplete="off" enctype="multipart/form-data">
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
        </li>
      </div>
    </div>
            </div>
        </div>
    </div>
@endsection