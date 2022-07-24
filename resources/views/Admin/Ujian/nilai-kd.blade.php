
            <div class="modal fade" id="tambah_nilai-kd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH NILAI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form action="/nilai/{{ $ujian->id }}/addnilai" method="post">
                        @csrf
                        <div class="form-group">
                            <label>KD</label>
                            <select class="form-control" id="kd" name="kd">
                                @foreach($hasil as $hsl) 
                                    <option value="{{ $hsl->id }}">{{ $hsl->kd }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>NIlai-KD</label>
                            <input type="text" name="nilai_kd" class="form-control form-control-sm @error('nilai_kd') is-invalid @enderror" placeholder="...">
                             
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{$submit ?? 'Simpan'}}</button>
                        </div>
                    </form>
                </div>
            </div>
      </div>
</div>