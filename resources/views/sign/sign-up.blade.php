@extends('sign.layouts.main')
@section('container')
<h4 class="mb-2">Selamat Datang di
    <h4>Perpustakaan LPTP Surakarta!</h4>
</h4>

<form class="row g-3" action="/sign-up" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control @error('name')is-invalid @enderror"
            id="name" placeholder="John Doe" name="name" value="{{ old('name') }}" required/>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Nomor KTP</label>
        <input type="number" id="no_ktp"
            class="form-control @error('no_ktp')is-invalid @enderror" placeholder="6587998941"
            name="no_ktp" value="{{ old('no_ktp') }}" maxlength="16" required/>
        @error('no_ktp')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Jenis Kelamin</label>
        <select class="form-select form-select-md" aria-label=".form-select-md example" name="jk" >
            <option value="Laki-Laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Tempat Lahir</label>
        <input class="form-control @error('tempat_lahir')is-invalid @enderror" type="text"
            id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required/>
        @error('tempat_lahir')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Tanggal Lahir</label>
        <input class="form-control @error('tgl_lahir')is-invalid @enderror" type="date"
            id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required/>
        @error('tgl_lahir')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Username</label>
        <input type="text" class="form-control @error('username')is-invalid @enderror"
            id="username" placeholder="jhondae" name="username" value="{{ old('username') }}" required/>
        @error('username')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input class="form-control @error('tempat_lahir')is-invalid @enderror" type="email"
            id="email" name="email" value="{{ old('email') }}" required/>
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Password</label>
        <input class="form-control @error('password')is-invalid @enderror" type="password"
            id="password" name="password" value="{{ old('password') }}" required/>
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">Nomor Telepon</label>
        <input type="text" id="no_tlpn"
            class="form-control @error('no_tlpn')is-invalid @enderror"
            placeholder="658 799 8941" name="no_tlpn" value="{{ old('no_tlpn') }}" maxlength="13" required/>
        @error('no_tlpn')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Alamat</label>
        <textarea class="form-control @error('alamat')is-invalid @enderror"
            id="alamat" name="alamat" value="{{ old('alamat') }}" required></textarea>
        @error('alamat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="Upload Foto" class="form-label">Upload Foto</label>
        <input class="form-control @error('image_foto') is-invalid @enderror"" type="file" id="image_foto" name="image_foto" value="{{ old('image_foto') }}" onchange="previewImage()"/>
      @error('image_foto')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
      @enderror
    </div>
    <div class="col-md-6">
        <label for="Upload Bukti" class="form-label">Upload Bukti</label>
        <input class="form-control @error('image_bukti') is-invalid @enderror"" type="file" id="image_bukti" name="image_bukti" value="{{ old('image_bukti') }}" onchange="previewImage()"/>
      @error('image_bukti')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
      @enderror
    </div>
    <div class="col-md-12">
        <label class="form-label">Unit Kerja</label>
        <select class="form-select form-select-md" aria-label=".form-select-md example" name="unit_kerja" >
            <option value="Mahasiswa">Mahasiswa</option>
            <option value="Staf Proyek">Staf Proyek</option>
            <option value="Staf Kantor">Staf Kantor</option>
        </select>
    </div>
    <div class="col-md-6">
        {{-- <label class="form-label">Role</label> --}}
        <input type="hidden" id="is_admin"
            class="form-control @error('is_admin')is-invalid @enderror" placeholder=""
            name="is_admin" value="1" required readonly/>
        @error('is_admin')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>




    <button type="submit" class="btn btn-primary mt-3">Send</button>
</form>


<p class="text-center mt-2">
    <span>Sudah punya akun?</span>
    <a href="sign-in">
        <span>Sign in</span>
    </a>
</p>
@endsection
