<div class="px-3">
    <div class="form-group mb-3">
        <label for="nama_akuns" class="form-label">Nama</label>
        <input type="text" id="nama_akuns" name="nama_akuns" class="form-control" value="{{ $target->name }}" disabled>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group mb-3">
                <label for="emails" class="form-label">Email</label>
                <input type="email" id="emails" name="emails" class="form-control" value="{{ $target->email }}" disabled>
            </div>
        </div>
        <div class="col">
            <div class="form-group mb-3">
                <label for="roles" class="form-label">Role</label>
                <select id="roles" name="roles" class="form-control" disabled>
                    <option>{{ $target->role }}</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="mapels" class="form-label">Mapel</label>
        <textarea name="mapels" id="mapels" cols="30" rows="10" class="form-control" disabled>{{ $target->mapel }}</textarea>
    </div>
</div>