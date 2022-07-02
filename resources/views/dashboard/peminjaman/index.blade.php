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
    
            <div class="col-md-4 px-3 py-3">
                <a href="/dashboard/peminjamans/create" class="btn btn-primary me-2 px-3">Tambah Data</a>
            </div>
            <div class="card-body table-border-style">
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
                                <th>Denda</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjamans as $peminjaman)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $peminjaman->no_peminjaman }}</td>
                                <td>{{ $peminjaman->users->name }}</td>
                                <td>{{ $peminjaman->katalogs->title }}</td>
                                <td>{{ $peminjaman->tgl_pinjam }}</td>
                                <td>{{ $peminjaman->tgl_kembali }}</td>
                                @if ($peminjaman->status->nama == 'Konfirmasi')
                                <td><span class="badge rounded-pill bg-success text-white">{{ $peminjaman->status->nama }}</span></td> 
                                @elseif ($peminjaman->status->nama == 'Kembali')
                                <td><span class="badge rounded-pill bg-primary text-white">{{ $peminjaman->status->nama }}</span></td>
                                @elseif ($peminjaman->status->nama == 'Pending')
                                <td><span class="badge rounded-pill bg-danger text-white">{{ $peminjaman->status->nama }}</span></td>
                                @else
                                <td><span class="badge rounded-pill bg-warning text-white">{{ $peminjaman->status->nama }}</span></td>
                                @endif
                                <td>{{ $peminjaman->denda }}</td>
                                <td>
                                    @if ($peminjaman->status->nama == 'Konfirmasi')
                                    <a href="/dashboard/peminjaman-buku/{{ $peminjaman->slug }}" class="badge bg-danger" style="color: white">Setujui</a>
                                    @endif
                                    @if ($peminjaman->status->nama == 'Sedang Dipinjam')
                                        <a href="/dashboard/pengembalian-buku/{{ $peminjaman->slug }}" class="badge bg-primary" style="color: white">Kembali</a>  
                                    @endif
                                    @if ($peminjaman->status->nama == 'Pending')
                                    <a href="/dashboard/peminjaman-buku/{{ $peminjaman->slug }}" class="badge bg-danger" style="color: white">Setujui</a>
                                    <a href="/dashboard/konfirmasi-buku/{{ $peminjaman->slug }}" class="badge bg-success" style="color: white">Konfirmasi</a>
                                    @else
                                    <a href="/dashboard/peminjamans/{{ $peminjaman->slug }}"
                                        class="badge bg-info"><i class="feather icon-eye" style="color: white"></i></a>
                                        <a href="/dashboard/peminjamans/{{ $peminjaman->slug }}/edit" class="badge bg-warning"><i class="feather icon-edit" style="color: white"></i></a>
                                    @endif
                                    <form action="/dashboard/peminjamans/{{ $peminjaman->slug }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="feather icon-trash" style="color: white"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--PAGINATION-->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    {{-- {{ $peminjamans->links() }} --}}
                  </li>
                </ul>
            </nav>
        </div>  
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection