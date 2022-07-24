
            <div class="modal fade" id="tambah_ktkelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH KELAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form action="{{ route('post.ktkelas') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>KELAS</label>
                            <input type="text" name="nmkelas" class="form-control form-control-sm @error('nmkelas') is-invalid @enderror" placeholder="...">
                                @error('nmkelas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{$submit ?? 'Simpan'}}</button>
                        </div>
                    </form>
                </div>
            </div>
      </div>
</div>