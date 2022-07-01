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
                <div class="col-md-4">
                    {{-- <div style="max-height: 350px; overflow:hidden;"> --}}
                    <img class="card-img card-img-left" src="{{ asset('storage/' . $bibliography->image) }}" alt="Card image" />
                    {{-- </div> --}}
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                      <div class="card-body table-border-style">
                        <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th scope="row" style="text-align: left;">Kategori</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important"><a
                                            class="badge bg-dark text-white">{{ $bibliography->category->name }}</a></td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left;">Judul</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $bibliography->title }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Penulis</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $bibliography->author->nama}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Edisi</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $bibliography->edisi }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">ISBN</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $bibliography->isbn }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Penerbit</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $bibliography->penerbit }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Tahun Terbit</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $bibliography->tahun_terbit }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Tempat Terbit</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $bibliography->tempat_terbit }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Jumlah</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $bibliography->jumlah }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Bahasa</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $bibliography->bahasa }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Lokasi Buku</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $bibliography->lokasi->nama }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Sinopsis</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{!! $bibliography->body !!}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="py-3">
                            <a href="/dashboard/layanan/bibliography" class="btn btn-info"><i class="feather icon-arrow-left" style="color: white"></i>Back</a>
                            <a href="/dashboard/layanan/bibliography/{{ $bibliography->slug }}/edit" class="btn btn-warning"><i class="feather icon-edit" style="color: white"></i></i>Edit</a>
                            <form action="/dashboard/layanan/bibliography/{{ $bibliography->slug }}" method="POST" class="d-inline">
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
