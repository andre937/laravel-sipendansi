
            <div class="modal fade" id="tambah_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH USER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form action="{{ route('admin.user') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>No. Induk</label>
                            <input type="number" name="no_induk" class="form-control form-control-sm @error('no_induk') is-invalid @enderror" placeholder="...">
                                @error('no_induk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="username" class="form-control form-control-sm @error('username') is-invalid @enderror" placeholder="...">
                                @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="...">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control-sm @error('semester') is-invalid @enderror">
                                <option disabled selected>- Pilih -</option>
                                <option value="Admin"
                                    @if ($user['role'] == 'Admin')
                                        selected
                                    @endif
                                >Admin</option>
                                <option value="Guru"
                                    @if ($user['role'] == 'Guru')
                                        selected
                                    @endif
                                >Guru</option>
                                <option value="Siswa"
                                    @if ($user['role'] == 'Siswa')
                                        selected
                                    @endif
                                >Siswa</option>
                            </select>
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