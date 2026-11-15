@php
    $student = $student ?? null;
@endphp

<h6 class="text-primary fw-semibold mb-2">Data Pribadi</h6>

<div class="row g-2 mb-2">
    <div class="col-md-6">
        <div class="form-floating">
            <input type="text" name="nis" id="nis" class="form-control form-control-sm @error('nis') is-invalid @enderror"
                   value="{{ old('nis', $student->nis ?? '') }}" maxlength="20" pattern="[0-9]+" inputmode="numeric"
                   title="NIS hanya boleh berisi angka" placeholder=" " required>
            <label for="nis">NIS</label>
            @error('nis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating">
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control form-control-sm @error('nama_lengkap') is-invalid @enderror"
                   value="{{ old('nama_lengkap', $student->nama_lengkap ?? '') }}" maxlength="100" placeholder=" " required>
            <label for="nama_lengkap">Nama Lengkap</label>
            @error('nama_lengkap')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row g-2 mb-2">
    <div class="col-md-6">
        <div class="form-floating">
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select form-select-sm @error('jenis_kelamin') is-invalid @enderror" required>
                <option value="" selected>Pilih</option>
                <option value="L" @selected(old('jenis_kelamin', $student->jenis_kelamin ?? '') === 'L')>Laki-laki</option>
                <option value="P" @selected(old('jenis_kelamin', $student->jenis_kelamin ?? '') === 'P')>Perempuan</option>
            </select>
            <label for="jenis_kelamin">Jenis Kelamin</label>
            @error('jenis_kelamin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating">
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control form-control-sm @error('tempat_lahir') is-invalid @enderror"
                   value="{{ old('tempat_lahir', $student->tempat_lahir ?? '') }}" maxlength="100" placeholder=" " required>
            <label for="tempat_lahir">Tempat Lahir</label>
            @error('tempat_lahir')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row g-2 mb-2">
    <div class="col-md-6">
        <div class="form-floating">
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control form-control-sm @error('tanggal_lahir') is-invalid @enderror"
                   value="{{ old('tanggal_lahir', isset($student) ? $student->tanggal_lahir->format('Y-m-d') : '') }}"
                   max="{{ date('Y-m-d') }}" placeholder=" " required>
            <label for="tanggal_lahir">Tanggal Lahir</label>
            @error('tanggal_lahir')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<h6 class="text-primary fw-semibold mb-2 mt-2">Alamat & Kontak</h6>

<div class="mb-2">
    <div class="form-floating">
        <textarea name="alamat" id="alamat" class="form-control form-control-sm @error('alamat') is-invalid @enderror"
                  placeholder=" " style="height: 90px" required>{{ old('alamat', $student->alamat ?? '') }}</textarea>
        <label for="alamat">Alamat</label>
        @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row g-2 mb-2">
    <div class="col-md-6">
        <div class="form-floating">
            <input type="text" name="no_telp" id="no_telp" class="form-control form-control-sm @error('no_telp') is-invalid @enderror"
                   value="{{ old('no_telp', $student->no_telp ?? '') }}" maxlength="15" pattern="[0-9]+" inputmode="numeric"
                   title="Nomor telepon hanya boleh berisi angka" placeholder=" ">
            <label for="no_telp">Nomor Telepon</label>
            @error('no_telp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating">
            <input type="email" name="email" id="email" class="form-control form-control-sm @error('email') is-invalid @enderror"
                   value="{{ old('email', $student->email ?? '') }}" maxlength="100" placeholder=" " required>
            <label for="email">Email</label>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
