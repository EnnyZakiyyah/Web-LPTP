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
            <div class="card-body table-border-style">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Alasan Pengajuan</th>
                                <th>Created</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perpanjangans as $perpanjangan)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $perpanjangan->peminjaman->katalogs->title }}</td>
                                <td>{{ $perpanjangan->peminjaman->users->name }}</td>
                                <td>{{ $perpanjangan->peminjaman->users->no_tlpn }}</td>
                                <td>{{ $perpanjangan->pesan }}</td>
                                <td>{{ $perpanjangan->created_at->toFormattedDateString() }}</td>
                                <td>
                                    <form action="/dashboard/tolak-pengajuan/{{ $perpanjangan->id }}" method="POST"
                                        class="d-inline" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" value="Ditolak" name="ajuan">
                                        <button type="submit" class="badge bg-danger border-0 text-white">Ditolak</button>
                                    </form>
                                    <form action="/dashboard/setuju-pengajuan/{{ $perpanjangan->id }}" method="POST"
                                        class="d-inline" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" value="Disetujui" name="ajuan">
                                        <button type="submit" class="badge bg-success border-0 text-white">Disetujui</button>
                                    </form>
                                </td>
                                {{-- <td> --}}
                                    {{-- <a href="/dashboard/authors/{{ $authors->slug }}/edit" class="badge bg-warning"><i class="feather icon-edit" style="color: white"></i></a> --}}
                                    {{-- <form action="/dashboard/ajuan-perpanjangan/{{ $perpanjangan->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="feather icon-trash" style="color: white"></i></button>
                                    </form> --}}
                                {{-- </td> --}}
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
                    {{-- {{ $authors->links() }} --}}
                  </li>
                </ul>
            </nav>
        </div>  
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection