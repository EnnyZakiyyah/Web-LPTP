@extends('home.layouts.main')

@section('container')
<div class="container">
<h1 class="pt-5 mb-2 fs-7 fw-bold"><span style="color: #002147"> Keanggotaan </span></h1>
    
    <!--Header-->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Keanggotaan</li>
      </ol>
    </nav>
    <!--Detil-->
    <section class="pt-5" >
      <div class="cards-6 section-gray">
        <div class="container">
          <div class="card mb-3" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
            <div class="row">
              <div class="col-md-4">
                @foreach ($keanggotaan as $keanggotaans)
                <div class="card-image">
                  <a href="#"> <img class="img" src="{{asset('storage/' . $keanggotaans->image)}}">
                  </a>
                </div>
              </div>
              <div class="col-md-8 py-4 px-4 mb-3">
                <a href="/home/layanan/keanggotaan/cetak-kartu" class="btn btn-primary" style="float: right">Cetak Kartu</a>
                <div class="table-responsive-sm">
                  <table class="table table-hover">
                    <tbody>
                      <tr>
                        <th scope="row" style="text-align: left;">Nomor Identitas</th>
                        <td >:</td>
                        <td style="text-align: justify !important">{{ $keanggotaans->no_ktp }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="text-align: left">Nama</th>
                        <td>:</td>
                        <td style="text-align: justify !important">{{ $keanggotaans->name }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="text-align: left">Nomor KTP</th>
                        <td>:</td>
                        <td style="text-align: justify !important">{{ $keanggotaans->no_ktp }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="text-align: left">Tempat Lahir</th>
                        <td>:</td>
                        <td style="text-align: justify !important">{{ $keanggotaans->tempat_lahir }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="text-align: left">Tanggal Lahir</th>
                        <td >:</td>
                        <td style="text-align: justify !important">{{ $keanggotaans->tgl_lahir }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="text-align: left">Alamat Kerja</th>
                        <td >:</td>
                        <td style="text-align: justify !important">{{ $keanggotaans->alamat }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="text-align: left">Unit Kerja</th>
                        <td>:</td>
                        <td style="text-align: justify !important">Staff</td>
                      </tr>
                    </tbody>
                    @endforeach
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