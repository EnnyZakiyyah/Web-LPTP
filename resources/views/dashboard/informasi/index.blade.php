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
                <a href="/dashboard/informasi/create" class="btn btn-primary me-2 px-3">Tambah Data</a>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th>No</th>
                                <th>Nama</th>
                                <th>ID</th>
                                <th>Tanggal</th>
                                <th>Informasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($informasis as $informasi)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $informasi->nama }}</td>
                                <td>{{ $informasi->slug }}</td>
                                <td>{{ $informasi->tanggal }}</td>
                                <td>{{ $informasi->informasi }}</td>
                                <td>
                                    <a href="/dashboard/informasi/{{ $informasi->slug }}/edit" class="badge bg-warning"><i class="feather icon-edit" style="color: white"></i></a>
                                    <form action="/dashboard/informasi/{{ $informasi->slug }}" method="POST" class="d-inline">
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
                    {{-- {{ $authors->links() }} --}}
                  </li>
                </ul>
            </nav>
        </div>  
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection