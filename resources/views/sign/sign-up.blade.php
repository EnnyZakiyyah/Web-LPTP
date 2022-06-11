@extends('sign.layouts.main')
@section('container')
<h4 class="mb-2">Selamat Datang di
    <h4>Perpustakaan LPTP Surakarta!</h4>
</h4>
<p class="mb-4">Make your app management easy and fun!</p>

<form class="row g-3" action="/sign-up" method="POST">
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
        <input type="text" id="no_ktp"
            class="form-control @error('no_ktp')is-invalid @enderror" placeholder="658 799 8941"
            name="no_ktp" value="{{ old('no_ktp') }}" required/>
        @error('no_ktp')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
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
            placeholder="658 799 8941" name="no_tlpn" value="{{ old('no_tlpn') }}" required/>
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
        {{-- <label class="form-label">Alamat</label>
        <input class="form-control @error('alamat')is-invalid @enderror" type="text"
            id="alamat" name="alamat" value="{{ old('alamat') }}" required/>
        @error('alamat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror --}}
    </div>




    <div class="col-md-6">
        <label for="formFile" class="form-label">Upload Foto</label>
        <input class="form-control" type="file" id="formFile" name="upload_foto" value="{{ old('upload_foto') }}"/>
    </div>





    <button type="submit" class="btn btn-primary">Send</button>
</form>


<p class="text-center">
    <span>Already have an account?</span>
    <a href="sign-in">
        <span>Sign in instead</span>
    </a>
</p>
@endsection
