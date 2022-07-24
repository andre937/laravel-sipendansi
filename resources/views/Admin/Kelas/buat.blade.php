<div class="row">
                    <div class="col-sm-12 small">
                        <div class="form-group">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label font-weight-bold">Walikelas</label>
                                <div class="col-sm-9">
                                    <select name="nama_guru" value="{{ old('nama_guru') ?? $kelas->nama_guru }}" class="form-control @error('nama_guru') is-invalid @enderror js-example-basic-single">
                                        <option disabled selected>- Pilih -</option>
                                            @foreach($gurus as $guru)
                                                <option {{ $guru->id == $kelas->guru_id ? 'selected' : '' }} value=" {{ $guru->id }} ">{{ $guru->nama_guru}}</option>
                                            @endforeach
                                        </select>
                                        @error('nama_guru')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label font-weight-bold">Nama Kelas</label>
                                <div class="col-sm-9">
                                    <input type="text" name="kelas" value="{{ old('kelas') ?? $kelas->kelas }}" class="form-control form-control-sm @error('kelas') is-invalid @enderror" placeholder="...">
                                        @error('kelas')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label font-weight-bold">Tahun Pelajaran</label>
                                <div class="col-sm-2">
                                    <input type="number" name="awal_tahun" value="{{ old('awal_tahun') ?? $kelas->awal_tahun }}" class="form-control @error('awal_tahun') is-invalid @enderror form-control-sm">
                                </div>
                                <p>/</p>
                                <div class="col-sm-2">
                                    <input type="number" name="akhir_tahun" value="{{ old('akhir_tahun') ?? $kelas->akhir_tahun }}" class="form-control @error('akhir_tahun') is-invalid @enderror form-control-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{$submit ?? 'Update'}}</button>
                    </div>