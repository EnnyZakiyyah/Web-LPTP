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
                <a href="/dashboard/faqs/create" class="btn btn-primary me-2 px-3">Tambah Data</a>
            </div>
            <div class="card-body table-border-style">
                <form action="/dashboard/faqs" class="d-flex">
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
                    @if ($faqs ->count())
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th>No</th>
                                <th>Judul Pertanyaan</th>
                                <th>ID</th>
                                <th>Jawaban</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $faq)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $faq->name }}</td>
                                <td>{{ $faq->slug }}</td>
                                <td>{{ $faq->pertanyaan }}</td>
                                <td>
                                    <a href="/dashboard/faqs/{{ $faq->slug }}/edit" class="badge bg-warning"><i class="feather icon-edit" style="color: white"></i></a>
                                    <form action="/dashboard/faqs/{{ $faq->slug }}" method="POST" class="d-inline">
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
            @else
            <p class="text-center fs-4">No Post Found.</p>
            @endif
            <!--PAGINATION-->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    {{ $faqs->links() }}
                  </li>
                </ul>
            </nav>
        </div>  
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection