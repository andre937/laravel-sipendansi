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