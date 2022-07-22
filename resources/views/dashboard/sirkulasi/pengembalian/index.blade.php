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
            <div class="card-body table-border-style">
                <form action="/dashboard/sirkulasi/pengembalians" class="d-flex">
                    <div class="col-lg-8 mb-3">
                        <div class="form">
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
                    @if ($pengembalians->count())
                <div class="table-responsive text-nowrap">
                    <div class="container">
                        <div class="row align-items-start">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th>No</th>
                                <th>No Peminjaman</th>
                                <th>Nama Peminjam</th>
                                <th>Nama Buku</th>
                                <th>Tgl Pinjam</th>
                                <th>Tgl Kembali</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status</th>
                                <th>Perpanjangan</th>
                                <th>Denda</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengembalians as $pengembalian)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $pengembalian->no_peminjaman }}</td>
                                <td>{{ $pengembalian->users->name }}</td>
                                <td>{{ $pengembalian->katalogs->title }}</td>
                                <td>{{ $pengembalian->tgl_pinjam }}</td>
                                <td>{{ $pengembalian->tgl_kembali }}</td>
                                <td>{{ $pengembalian->tgl_pengembalian }}</td>
                                @if ($pengembalian->status->nama == 'Konfirmasi')
                                <td><span class="badge rounded-pill bg-success text-white">{{ $pengembalian->status->nama }}</span></td> 
                                @elseif ($pengembalian->status->nama == 'Kembali')
                                <td><span class="badge rounded-pill bg-primary text-white">{{ $pengembalian->status->nama }}</span></td>
                                @elseif ($pengembalian->status->nama == 'Pending')
                                <td><span class="badge rounded-pill bg-danger text-white">{{ $pengembalian->status->nama }}</span></td>
                                @else
                                <td><span class="badge rounded-pill bg-warning text-white">{{ $pengembalian->status->nama }}</span></td>
                                @endif
                                <td>{{ $pengembalian->id_perpanjangan }}</td>
                                <td>{{ $pengembalian->denda }}</td>
                                <td>
                                    <a href="/dashboard/peminjamans/{{ $pengembalian->slug }}"
                                        class="badge bg-info"><i class="feather icon-eye" style="color: white"></i></a>
                                    {{-- <form action="/dashboard/peminjamans/{{ $pengembalian->slug }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="feather icon-trash" style="color: white"></i></button>
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
                    {{ $pengembalians->links() }}
                  </li>
                </ul>
            </nav>
        </div>  
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection