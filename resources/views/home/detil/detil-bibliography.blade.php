@extends('home.layouts.main')

@section('container')
<div class="container" >
  <h1 class="pt-5 mb-2 fs-7 fw-bold"><span style="color: #002147"> {{ $katalog->title }} </span></h1>
  {{-- style="background-color: #E5E5E5" --}}
      <!--Header-->
      <nav class="pb-4" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-decoration-none"  href="/">Home</a></li>
          <li class="breadcrumb-item"><a class="text-decoration-none" href="/home/sirkulasi/penelusuran-katalog">Penelusuran Katalog</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $katalog->title }}</li>
        </ol>
      </nav>
  
       <!--Detil-->
          <section class="pt-5" >
            <div class="cards-6 section-gray">
              <div class="container">
                <div class="card mb-3" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="card-image">
                        <a href="#"> <img class="img" src="{{ asset('storage/' . $katalog->image) }}">
                          <div class="card-caption px-2 py-1"><a href="/home/layanan/bibliographies?category={{ $katalog->category->slug }}" class="text-white text-decoration-none"> {{ $katalog->category->name }} </a></div>
                        </a>
                    </div>
                    </div>
                    <div class="col-md-8 py-4 px-4 mb-3">
                      <div class="table-responsive-sm">
                        <table class="table table-hover">
                          <tbody>
                            <tr>
                              <th scope="row" style="text-align: left;">Judul</th>
                              <td >:</td>
                              <td style="text-align: justify !important">{{ $katalog->title }}</td>
                            </tr>
                            <tr>
                              <th scope="row" style="text-align: left">Penulis</th>
                              <td>:</td>
                              <td style="text-align: justify !important"><a class="text-decoration-none">{{ $katalog->author_id }}</a></td>
                            </tr>
                            <tr>
                              <th scope="row" style="text-align: left">Edisi</th>
                              <td>:</td>
                              <td style="text-align: justify !important">{{ $katalog->edisi }}</td>
                            </tr>
                            <tr>
                              <th scope="row" style="text-align: left">ISBN</th>
                              <td>:</td>
                              <td style="text-align: justify !important">{{ $katalog->isbn}}</a></td>
                            </tr>
                            <tr>
                              <th scope="row" style="text-align: left">Penerbit</th>
                              <td>:</td>
                              <td style="text-align: justify !important">{{ $katalog->penerbit }}</td>
                            </tr>
                            <tr>
                              <th scope="row" style="text-align: left">Tahun Terbit</th>
                              <td >:</td>
                              <td style="text-align: justify !important">{{ $katalog->tahun_terbit }}</td>
                            </tr>
                            <tr>
                              <th scope="row" style="text-align: left">Tempat Terbit</th>
                              <td >:</td>
                              <td style="text-align: justify !important">{{ $katalog->tempat_terbit }}</td>
                            </tr>
                            <tr>
                              <th scope="row" style="text-align: left">Jumlah</th>
                              <td>:</td>
                              <td style="text-align: justify !important">{{ $katalog->jumlah }}</td>
                            </tr>
                            <tr>
                              <th scope="row" style="text-align: left">Bahasa</th>
                              <td>:</td>
                              <td style="text-align: justify !important">{{ $katalog->bahasa }}</td>
                            </tr>
                            <tr>
                              <th scope="row" style="text-align: left">Lokasi Buku</th>
                              <td>:</td>
                              <td style="text-align: justify !important">{{ $katalog->lokasi->nama }}</td>
                            </tr>
                            <tr>
                              <th scope="row" style="text-align: left">Sinopsis</th>
                              <td >:</td>
                              <td style="text-align: justify !important">{!! $katalog->body !!}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </section>
  </div>
@endsection