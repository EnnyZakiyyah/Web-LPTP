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
            <div class="card-header">
                <h5>{{ $title }}</h5>
            </div>
            
            @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if (session()->has('loginError'))
            <div class="alert alert-danger" role="alert">
                {{ session('loginError') }}
            </div>
            @endif
            
            {{-- <div class="col-md-4 px-3 py-3">
                <a href="/dashboard/peminjamans/create" class="btn btn-primary me-2 px-3">Tambah Data</a>
            </div> --}}
            <!--Penelusuran Katalog-->
            <div class="card-body table-border-style">
                <form action="/dashboard/peminjamans" class="d-flex">
                <div class="col-lg-8 mb-3">
                    <div class="form">
                        {{-- <div class="col-md-10"> --}}
                            <select class='fstdropdown-select' id="first" name="search" value="{{ request('search') }}">
                                @foreach ($katalogs as $katalog)
                                @if (old('search') == $katalog->id)
                                <option value="{{ $katalog->id }}" selected>{{ $katalog->title }}</option>
                                @else
                                <option value="{{ $katalog->id }}">{{ $katalog->title }}</option>
                                @endif
                                @endforeach
                              </select>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
                </form>
                @if ($peminjamans->count())
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th>No</th>
                                <th>No Peminjaman</th>
                                <th>Nama Peminjam</th>
                                <th>Nama Buku</th>
                                <th>Tgl Pinjam</th>
                                <th>Tgl Kembali</th>
                                <th>Status</th>
                                <th>Kondisi Buku</th>
                                <th>Perpanjangan</th>
                                <th>Aksi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjamans as $peminjaman)
                            @if ($peminjaman->id_status == 1)

                            @endif
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $peminjaman->no_peminjaman }}</td>
                                <td>{{ $peminjaman->users->name }}</td>
                                <td>{{ $peminjaman->katalogs->title }}</td>
                                <td>{{ $peminjaman->tgl_pinjam }}</td>
                                <td>{{ $peminjaman->tgl_kembali }}</td>
                                {{-- ===== STATUS ===== --}}
                                <td>@if ($peminjaman->status->nama == 'Konfirmasi')
                                    <span
                                        class="badge rounded-pill bg-success text-white">{{ $peminjaman->status->nama }}</span>

                                    @elseif ($peminjaman->status->nama == 'Kembali')
                                    <span
                                        class="badge rounded-pill bg-primary text-white">{{ $peminjaman->status->nama }}</span>

                                    @elseif ($peminjaman->status->nama == 'Pending')
                                    <span
                                        class="badge rounded-pill bg-danger text-white">{{ $peminjaman->status->nama }}</span>

                                    @elseif ($peminjaman->status->nama == 'Ditolak')
                                    <span
                                        class="badge rounded-pill bg-dark text-white">{{ $peminjaman->status->nama }}</span>
                                        <br>{{ $peminjaman->alasan }}
                                    @else
                                    <span
                                        class="badge rounded-pill bg-warning text-white">{{ $peminjaman->status->nama }}</span>
                                    @endif
                                </td>
                                {{-- ===== KONDISI BUKU ===== --}}
                                <td>
                                    @if ($peminjaman->id_kondisi == null)
                                    @if ($peminjaman->id_perpanjangan == null)
                                    @if ($peminjaman->status->nama == 'Sedang Dipinjam')
                                    <a href="/dashboard/kondisi-peminjaman/hilang/{{ $peminjaman->slug }}"
                                        class="badge bg-danger border-0 text-white">Hilang</a>
                                    <a href="/dashboard/kondisi-peminjaman/rusak/{{ $peminjaman->slug }}"
                                        class="badge bg-warning border-0 text-white">Rusak</a>
                                    <form action="/dashboard/kondisi-peminjaman/{{ $peminjaman->slug }}" method="POST"
                                        class="d-inline" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" value="3" name="id_kondisi">
                                        <button type="submit"
                                            class="badge bg-success border-0 text-white">Bagus</button>
                                    </form>
                                    @else
                                    {{-- <td></td>  --}}
                                    @endif
                                    @endif
                                    @endif
                                    {{-- <td></td> --}}
                                    @if ($peminjaman->id_kondisi != null)
                                    <a class="badge bg-primary text-white">Berhasil Dikonfirmasi</a>
                                    <br>
                                    @if ($peminjaman->status->nama == 'Diperpanjang')
                                        @if ($peminjaman->id_kondisi == 1)
                                        <button
                                        class="badge bg-danger border-0 text-white">Hilang</button>
                                        @elseif ($peminjaman->id_kondisi == 2)
                                        <button
                                        class="badge bg-warning border-0 text-white">Rusak</button>
                                        @endif
                                    @endif

                                    {{-- KONDISI 2 --}}
                                    <br>
                                    @elseif ($peminjaman->status->nama == 'Perpanjangan')
                                    <a href="/dashboard/kondisi-peminjaman/hilang/{{ $peminjaman->slug }}"
                                        class="badge bg-danger border-0 text-white">Hilang</a>
                                    <a href="/dashboard/kondisi-peminjaman/rusak/{{ $peminjaman->slug }}"
                                        class="badge bg-warning border-0 text-white">Rusak</a>
                                    <form action="/dashboard/kondisi-peminjaman/{{ $peminjaman->slug }}" method="POST"
                                        class="d-inline" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" value="3" name="id_kondisi">
                                        <button type="submit"
                                            class="badge bg-success border-0 text-white">Bagus</button>
                                    </form>
                                    @elseif($peminjaman->id_perpanjangan == 'Ditolak')
                                    <form action="/dashboard/kondisi-peminjaman/{{ $peminjaman->slug }}" method="POST"
                                        class="d-inline" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" value="1" name="id_kondisi">
                                        <button type="submit"
                                            class="badge bg-danger border-0 text-white">Hilang</button>
                                    </form>
                                    <form action="/dashboard/kondisi-peminjaman/{{ $peminjaman->slug }}" method="POST"
                                        class="d-inline" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" value="2" name="id_kondisi">
                                        <button type="submit"
                                            class="badge bg-warning border-0 text-white">Rusak</button>
                                    </form>
                                    <form action="/dashboard/kondisi-peminjaman/{{ $peminjaman->slug }}" method="POST"
                                        class="d-inline" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" value="3" name="id_kondisi">
                                        <button type="submit"
                                            class="badge bg-success border-0 text-white">Bagus</button>
                                    </form>
                                    @endif
                                </td>
                                {{-- ===== PERPANJANGAN ===== --}}
                                <td>
                                    @if ($peminjaman->id_perpanjangan != null)
                                    @if ($peminjaman->id_perpanjangan == 'Pengajuan')
                                    <a class="badge bg-info text-white">Mengajukan</a>
                                    <br>
                                    <form action="/dashboard/ajuan-disetujui/{{ $peminjaman->slug }}" method="POST"
                                        class="d-inline" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" value="Disetujui" name="id_perpanjangan">
                                        <button type="submit"
                                            class="badge bg-success border-0 text-white">Disetujui</button>
                                    </form>
                                    <form action="/dashboard/ajuan-ditolak/{{ $peminjaman->slug }}" method="POST"
                                        class="d-inline" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <input type="text" name="alasan_ajuan" required>
                                        <input type="hidden" value="Ditolak" name="id_perpanjangan">
                                        <button type="submit"
                                            class="badge bg-danger border-0 text-white" onclick="return confirm('Mohon diisi alasan penolakan!')">Ditolak</button>
                                    </form>
                                    @endif
                                    @if ($peminjaman->id_perpanjangan == 'Disetujui')
                                    <a
                                        class="badge rounded-pill bg-success text-white text-decoration-none">Disetujui</a>
                                    @elseif ($peminjaman->id_perpanjangan == 'Ditolak')
                                    <a
                                        class="badge rounded-pill bg-secondary text-white text-decoration-none">Ditolak</a>
                                        <br>{{ $peminjaman->alasan_ajuan }}
                                    @endif
                                    @endif
                                </td>
                                {{-- ===== AKSI ===== --}}
                                <td>
                                    @if ($peminjaman->status->nama == 'Konfirmasi')
                                    <a href="/dashboard/peminjaman-buku/{{ $peminjaman->id }}"
                                        class="badge bg-secondary" style="color: white">Setujui</a>
                                    @endif
                                    @if ($peminjaman->id_kondisi != null)
                                    <a href="/dashboard/pengembalian-buku/{{ $peminjaman->slug }}"
                                        class="badge bg-primary border-0 text-white">Kembali</a>
                                    @endif
                                    @if ($peminjaman->status->nama == 'Pending')
                                    <form action="/dashboard/tolak-peminjaman/{{ $peminjaman->slug }}" method="POST"
                                        class="d-inline" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <input type="text" name="alasan" required>
                                        <button type="submit"
                                        class="badge bg-danger border-0" style="color: white" onclick="return confirm('Mohon diisikan alasan peminjaman ditolak?')">Ditolak</button>
                                    </form>
                                    <a href="/dashboard/konfirmasi-buku/{{ $peminjaman->slug }}"
                                        class="badge bg-success" style="color: white">Konfirmasi</a>
                                    @endif
                                    @if ($peminjaman->status->nama == 'Ditolak')
                                    @endif
                                    {{-- @if($peminjaman->status->nama == 'Sedang Dipinjam')
                                    <a href="/dashboard/peminjamans/{{ $peminjaman->slug }}/edit"
                                    class="badge bg-warning"><i class="feather icon-edit" style="color: white"></i></a>
                                    @endif --}}
                                    {{-- <br><form action="/dashboard/peminjamans/{{ $peminjaman->slug }}" method="POST"
                                    class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('Are you sure?')"><i class="feather icon-trash"
                                            style="color: white"></i></button>
                                    </form> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <p class="text-center fs-4">No Post Found.</p>
            @endif
            <!--PAGINATION-->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        {{ $peminjamans->links() }}
                    </li>
                </ul>
            </nav>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<script>
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
