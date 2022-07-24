
            <div class="modal fade" id="tambah_nilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH USER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form action="/siswa/{{ $siswa->id }}/addnilai" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nama Pelajaran</label>
                            <select class="form-control" id="pelajaran" name="pelajaran">
                                @foreach($plajaran as $plj) 
                                    <option value="{{ $plj->id }}">{{ $plj->pelajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{$submit ?? 'Simpan'}}</button>
                        </div>
                    </form>
                </div>
            </div>
      </div>
</div>