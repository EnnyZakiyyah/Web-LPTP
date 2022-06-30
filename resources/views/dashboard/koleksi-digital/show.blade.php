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
                    <img class="card-img card-img-left" src="{{ asset('storage/' . $koleksidigital->image) }}" alt="Card image" />
                    <iframe src="{{ asset('storage/' . $koleksidigital->filekatalog) }}" width="100%" height="500px">
                    </iframe>
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
                                            href="/home/sirkulasi/penelusuran-katalog?category={{ $koleksidigital->category->slug }}"
                                            class="badge bg-dark text-white">{{ $koleksidigital->category->name }}</a></td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left;">Judul</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $koleksidigital->title }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Penulis</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $koleksidigital->author->nama}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Edisi</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $koleksidigital->edisi }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">ISBN</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $koleksidigital->isbn }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Penerbit</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $koleksidigital->penerbit }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Tahun Terbit</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $koleksidigital->tahun_terbit }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Tempat Terbit</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $koleksidigital->tempat_terbit }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Jumlah</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $koleksidigital->jumlah }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Bahasa</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{{ $koleksidigital->bahasa }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: left">Sinopsis</th>
                                    <td>:</td>
                                    <td style="text-align: justify !important">{!! $koleksidigital->body !!}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="py-3">
                            <a href="/dashboard/koleksidigitals" class="btn btn-info"><i class="feather icon-arrow-left" style="color: white"></i>Back</a>
                            <a href="/dashboard/koleksidigitals/{{ $koleksidigital->slug }}/edit" class="btn btn-warning"><i class="feather icon-edit" style="color: white"></i></i>Edit</a>
                            <form action="/dashboard/koleksidigitals/{{ $koleksidigital->slug }}" method="POST" class="d-inline">
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
