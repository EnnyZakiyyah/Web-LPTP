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
                <form action="/dashboard/users" class="d-flex">
                    <div class="col-lg-11 mb-3">
                        <div class="form">
                            <i class="fa fa-search"></i>
                            <input type="text" class="form-control form-input" placeholder="Search anything..." name="search"
                            value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-auto mt-3">
                        <button class="btn btn-primary btn-sm" type="submit">Search</button>
                    </div>
                    </form>
                    @if ($users->count())
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Ktp</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Validasi Akun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->no_ktp }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->approved == 1)
                                    <span
                                    class="badge rounded-pill bg-primary text-white">Admin</span>
                                    @elseif($user->approved == 2)
                                        <span
                                        class="badge rounded-pill bg-success text-white">Anggota</span>
                                    @elseif($user->approved == null)
                                    <span
                                    class="badge rounded-pill bg-warning text-white">Validasi</span>
                                    <br>{{ $user->alasan }}
                                    @else
                                    <span
                                    class="badge rounded-pill bg-dark text-white">Ditolak</span>
                                    <br>{{ $user->alasan }}
                                    @endif
                                </td>
                                <td>
                                    @if ($user->approved == 0)
                                    <form action="/dashboard/users/{{ $user->id }}" method="POST" class="d-inline">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" value="2" name="approved">
                                        <button class="badge bg-success border-0"><i class="feather icon-check-square" style="color: white"></i></button>
                                    </form>
                                    <form action="/dashboard/users/ditolak/{{ $user->id }}" method="POST" class="d-inline">
                                        @method('put')
                                        @csrf
                                        <input type="text" name="alasan" required>
                                        <input type="hidden" value="3" name="approved">
                                        <button class="badge bg-danger border-0"><i class="feather icon-x-square" style="color: white" onclick="return confirm('Mohon diisi alasan penolakan!')"></i></button>
                                    </form>
                                    @endif
                                    <a href="/dashboard/users/{{ $user->id }}"
                                        class="badge bg-info"><i class="feather icon-eye" style="color: white"></i></a>
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
                    {{ $users->links() }}
                  </li>
                </ul>
            </nav>
        </div>  
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection