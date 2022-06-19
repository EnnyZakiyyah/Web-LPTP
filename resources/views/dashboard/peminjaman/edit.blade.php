@extends('dashboard.layouts.main')
@section('container')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Welcome back, {{ auth()->user()->name }}</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">{{ $title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="card">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body table-border-style">
                <div class="col-lg-10">
                    <form method="POST" action="/dashboard/peminjamans/{{ $peminjaman->slug }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3 row">
                            <label for="no_peminjaman" class="col-md-2 col-form-label">No Peminjaman</label>
                            <div class="col-md-10">
                              <input class="form-control @error('no_peminjaman') is-invalid @enderror" type="text" name="no_peminjaman" id="no_peminjaman" value="{{ old('no_peminjaman', $peminjaman->no_peminjaman) }}" required autofocus/>
                            @error('no_peminjaman')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="slug" class="col-md-2 col-form-label">Username</label>
                            <div class="col-md-10">
                              <input class="form-control @error('slug') is-invalid @enderror" type="text" name="slug" id="slug" value="{{ old('slug', $peminjaman->slug) }}" readonly/>
                            @error('slug')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="id_peminjam" class="col-md-2 col-form-label">Nama Peminjam</label>
                            <div class="col-md-10">
                                <select class='fstdropdown-select' id="first" name="id_peminjam">
                                    @foreach ($users as $user)
                                    @if (old('id_peminjam', $peminjaman->id_peminjam) == $user->id)
                                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                    @else
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                    @endforeach
                                  </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="id_petugas" class="col-md-2 col-form-label">Nama Petugas</label>
                            <div class="col-md-10">
                                <select class='fstdropdown-select' id="first" name="id_petugas">
                                    @foreach ($users as $user)
                                    @if (old('id_petugas', $peminjaman->id_petugas) == $user->id)
                                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                    @else
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                    @endforeach
                                  </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="id_buku" class="col-md-2 col-form-label">Nama Buku</label>
                            <div class="col-md-10">
                                <select class='fstdropdown-select' id="first" name="id_buku">
                                    @foreach ($katalogs as $katalog)
                                    @if (old('id_buku', $peminjaman->id_buku) == $katalog->id)
                                    <option value="{{ $katalog->id }}" selected>{{ $katalog->title }}</option>
                                    @else
                                    <option value="{{ $katalog->id }}">{{ $katalog->title }}</option>
                                    @endif
                                    @endforeach
                                  </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tgl_pinjam" class="col-md-2 col-form-label">Tanggal Pinjam</label>
                            <div class="col-md-10">
                              <input class="form-control @error('tgl_pinjam') is-invalid @enderror" type="date" name="tgl_pinjam" id="tgl_pinjam" value="{{ old('tgl_pinjam', $peminjaman->tgl_pinjam) }}"/>
                            @error('tgl_pinjam')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tgl_kembali" class="col-md-2 col-form-label">Tanggal Kembali</label>
                            <div class="col-md-10">
                              <input class="form-control @error('tgl_kembali') is-invalid @enderror" type="date" name="tgl_kembali" id="tgl_kembali" value="{{ old('tgl_kembali', $peminjaman->tgl_kembali) }}"/>
                            @error('tgl_kembali')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="lokasi" class="col-md-2 col-form-label">Lokasi</label>
                            <div class="col-md-10">
                                <select class="form-control" id="lokasi" name="id_lokasi">
                                    @foreach ($lokasis as $lokasi)
                                    @if (old('id_lokasi', $peminjaman->id_lokasi) == $lokasi->id)
                                    <option value="{{ $lokasi->id }}" selected>{{ $lokasi->nama }}</option>
                                    @else
                                    <option value="{{ $lokasi->id }}">{{ $lokasi->nama }}</option>
                                    @endif
                                    @endforeach
                                </select>
                              {{-- <input class="form-control" type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}"/> --}}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="status" class="col-md-2 col-form-label">Status</label>
                            <div class="col-md-10">
                                <select class="form-control" id="status" name="id_status">
                                    @foreach ($statuses as $status)
                                    @if (old('id_status', $peminjaman->id_status) == $status->id)
                                    <option value="{{ $status->id }}" selected>{{ $status->nama }}</option>
                                    @else
                                    <option value="{{ $status->id }}">{{ $status->nama }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="denda" class="col-md-2 col-form-label">Denda</label>
                            <div class="col-md-10">
                              <input class="form-control @error('denda') is-invalid @enderror" type="text" name="denda" id="denda" value="{{ old('denda', $peminjaman->denda) }}"/>
                            @error('denda')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="float:right">Edit Data</button>
                      </form>
                </div>
            </div>
        </div>   
        <!-- [ Main Content ] end -->
    </div>
</div>

<script>
    //SLUG
    const no_peminjaman = document.querySelector('#no_peminjaman');
    const slug = document.querySelector('#slug');

    no_peminjaman.addEventListener('change', function() {
        fetch('/dashboard/peminjamans/checkSlug?no_peminjaman=' +no_peminjaman.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    //Dropdown Search
    function setDrop() {
            if (!document.getElementById('third').classList.contains("fstdropdown-select"))
                document.getElementById('third').className = 'fstdropdown-select';
            setFstDropdown();
        }
        setFstDropdown();
        function removeDrop() {
            if (document.getElementById('third').classList.contains("fstdropdown-select")) {
                document.getElementById('third').classList.remove('fstdropdown-select');
                document.getElementById("third").fstdropdown.dd.remove();
                document.querySelector("#third~.fstdiv").remove();
            }
        }
        function addOptions(add) {
            var select = document.getElementById("fourth");
            for (var i = 0; i < add; i++) {
                var opt = document.createElement("option");
                var o = Array.from(document.getElementById("fourth").querySelectorAll("option")).slice(-1)[0];
                var last = o == undefined ? 1 : Number(o.value) + 1;
                opt.text = opt.value = last;
                select.add(opt);
            }
        }
        function removeOptions(remove) {
            for (var i = 0; i < remove; i++) {
                var last = Array.from(document.getElementById("fourth").querySelectorAll("option")).slice(-1)[0];
                if (last == undefined)
                    break;
                Array.from(document.getElementById("fourth").querySelectorAll("option")).slice(-1)[0].remove();
            }
        }
        function updateDrop() {
            document.getElementById("fourth").fstdropdown.rebind();
        }

</script>
@endsection