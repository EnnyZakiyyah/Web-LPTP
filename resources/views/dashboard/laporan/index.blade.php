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
            <form action="/dashboard/laporan" method="GET">
                {{-- @csrf --}}
                <div class="mb-2 row px-4">
                    <label for="fromdate" class="col-md-2 col-form-label" style="font-weight: 600">Tanggal Pinjam
                        Awal</label>
                    <div class="col-md-4">
                        <input class="form-control" type="date" name="tglawal" id="tglawal" required/>
                    </div>
                    <label for="todate" class="col-md-2 col-form-label" style="font-weight: 600">Tanggal Pinjam
                        Akhir</label>
                    <div class="col-md-4">
                        <input class="form-control" type="date" name="tglakhir" id="tglakhir" required/>
                    </div>
                    <label class="col-md-2 col-form-label" style="font-weight: 600">Kondisi Buku</label>
                    <div class="col-md-4">
                        <select class="form-control" id="kondisi" name="id_kondisi">
                            @foreach ($kondisis as $kondisi)
                            @if (old('id_kondisi') == $kondisi->id)
                            <option value="{{ $kondisi->id }}" selected>{{ $kondisi->nama }}</option>
                            @else
                            <option value="{{ $kondisi->id }}">{{ $kondisi->nama }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <label class="col-md-2 col-form-label" style="font-weight: 600">Unit Kerja Anggota</label>
                    <div class="col-md-2">
                        <select class="form-control" id="unitkerja" name="unit_kerja">
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Staf Proyek">Staf Proyek</option>
                            <option value="Staf Kantor">Staf Kantor</option>
                        </select>
                    </div>
                    <div class="col-md-1 col-form-label">
                        <button class="btn btn-primary btn-sm" type="submit">Search</button>
                    </div>
                    <div class="col-md-1 col-form-label">
                        <a href="" onclick="this.href='/dashboard/cetak-laporan-tanggal/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value + '/' + document.getElementById('kondisi').value + '/' + document.getElementById('unitkerja').value" target="_blank" class="btn btn-info btn-sm" style="float: right"><i class="feather icon-printer"></i> Cetak </a>
                    </div><br>
                </div>
            </form>
            @if ($laporans->count())
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
                                <th>Kondisi Buku</th>
                                <th>Perpanjangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporans as $laporan)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $laporan->no_peminjaman }}</td>
                                <td>{{ $laporan->users->name }}</td>
                                <td>{{ $laporan->katalogs->title }}</td>
                                <td>{{ $laporan->tgl_pinjam }}</td>
                                <td>{{ $laporan->tgl_kembali }}</td>
                                <td>{{ $laporan->status->nama }}</td>
                                <td>{{ $laporan->kondisi->nama }}</td>
                                <td>{{ $laporan->id_perpanjangan}}</td>
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
                        {{ $laporans->links() }}
                    </li>
                </ul>
            </nav>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection
