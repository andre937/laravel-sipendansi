<div class="modal fade" id="edit_semester" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH SEMESTER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form action="{{ route('post.edit') }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label font-weight-bold">Semester</label>
                            <div class="col-sm-9">
                                <select name="semesters" id="semesters" class="form-control @error('semester') is-invalid @enderror">
                                    <option disabled selected>- Pilih -</option>
                                    @foreach($siswa->semesters as $semester)
                                        <option selected value="{{ $semester->id }}">{{ $semester->semester }}</option>
                                    @endforeach
                                    @foreach($semesters as $semester)
                                        <option value=" {{ $semester->id }} ">{{ $semester->semester }}</option>
                                    @endforeach
                                </select>
                                    @error('semesters')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">{{$submit ?? 'Simpan'}}</button>
                        </div>
                    </form>
                </div>
            </div>
      </div>
</div>
