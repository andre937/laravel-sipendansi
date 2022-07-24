<div class="row">
                    <div class="col-sm-12 small">
                        <div class="form-group">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label font-weight-bold">NIP</label>
                                <div class="col-sm-9">
                                    <input type="number" name="nip" value="{{ old('nip') ?? $guru->nip }}" class="form-control form-control-sm @error('nip') is-invalid @enderror" placeholder="...">
                                        @error('nip')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bold">Nama Guru</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_guru" value="{{ old('nama_guru') ?? $guru->nama_guru }}" class="form-control form-control-sm @error('nama_guru') is-invalid @enderror" placeholder="...">
                                        @error('nama_guru')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label font-weight-bold">Jabatan</label>
                                <div class="col-sm-9">
                                    <select name="nama_jabatan" value="{{ old('nama_jabatan') ?? $guru->nama_jabatan }}" class="form-control @error('nama_jabatan') is-invalid @enderror js-example-basic-single">
                                        <option disabled selected>- Pilih -</option>
                                            @foreach($jabatans as $jabatan)
                                                <option {{ $jabatan->id == $guru->jabatan_id ? 'selected' : '' }} value=" {{ $jabatan->id }} ">{{ $jabatan->nama_jabatan}}</option>
                                            @endforeach
                                        </select>
                                        @error('nama_jabatan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{$submit ?? 'Update'}}</button>
                    </div>