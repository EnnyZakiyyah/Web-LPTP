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
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="card">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                      <div class="card-body table-border-style">
                        <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th scope="row" style="text-align: left;">No Peminjaman</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $peminjaman->no_peminjaman }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Nama Petugas</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $peminjaman->users->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Nama Peminjam</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $peminjaman->users->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Nama Buku</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $peminjaman->katalogs->title }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">ISBN</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $peminjaman->katalogs->isbn }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Tanggal Peminjaman</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $peminjaman->tgl_pinjam }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Tanggal Kembali</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $peminjaman->tgl_kembali }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Tanggal Pengembalian</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $peminjaman->tgl_pengembalian }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Status</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $peminjaman->status->nama }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Kondisi Buku</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $peminjaman->kondisi->nama }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Denda</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $peminjaman->denda }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Lokasi Peminjaman</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $peminjaman->lokasi->nama }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="py-3">
                            <a href="/dashboard/peminjamans" class="btn btn-info"><i class="feather icon-arrow-left" style="color: white"></i>Back</a>
                            <a href="/dashboard/peminjamans/{{ $peminjaman->slug }}/edit" class="btn btn-warning"><i class="feather icon-edit" style="color: white"></i></i>Edit</a>
                            <form action="/dashboard/peminjamans/{{ $peminjaman->slug }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="feather icon-trash" style="color: white"></i>Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            <!-- [ Hover-table ] end -->
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection
