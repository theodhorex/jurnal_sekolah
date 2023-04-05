<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel2">Edit Akun</h1>
        <button id="button_close_detail_kelas" type="button" class="border-0 bg-transparent text-secondary"
                        data-bs-dismiss="modal" aria-label="Close" style=""><i class="fa fa-times"></i></button>
    </div>
    <div class="modal-body">
        <div class="px-3">
            <div class="form-group mb-3">
                <label for="nama_akuns" class="form-label">Nama</label>
                <input type="text" id="nama_akuns" name="nama_akuns" class="form-control"
                    value="{{ $target->name }}">
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="emails" class="form-label">Email</label>
                        <input type="email" id="emails" name="emails" class="form-control"
                            value="{{ $target->email }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="roles" class="form-label">Role</label>
                        <select id="roles" name="roles" class="form-control">
                            <option value="{{ $target->role }}" selected="true">{{ $target->role }}
                            </option>
                            <option value="visitor">Visitor</option>
                            <option value="guru">Guru</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="mapels" class="form-label">Mapel</label>
                <textarea name="mapels" id="mapels" cols="30" rows="10" class="form-control">{{ $target->mapel }}</textarea>
                <label for="" class="my-0 py-0" style="color: rgba(0, 0, 0, 0.406);">*Mapel bisa dikosongkan bila tidak memiliki mapel.</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onClick="updateAkun({{ $target->id }})">Simpan</button>
    </div>
</div>
