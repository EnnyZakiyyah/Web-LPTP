@extends('home.layouts.main')

@section('container')
<div class="container">
  
<h1 class="pt-5 mb-2 fs-7 fw-bold"><span style="color: #002147"> Sirkulasi </span></h1>
    <!--Header-->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Peminjaman Buku</li>
      </ol>
    </nav> 

    <!--Koleksi-Dipinjam-->
  <section class="pt-2">
    <div class="card mb-5">
      <div class="card-header">
        Reminder Pengembalian Buku
      </div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
            @foreach ($reminders as $reminder)
            <span style="font-size: 14px"> {{ \Carbon\Carbon::parse($reminder->reminder_at)->isoFormat('D MMMM Y') }}</span>
            <p style="font-size: 14px">Judul Buku : {{ $reminder->katalogs->title}}</p>
            @endforeach
        </blockquote>
      </div>
    </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><span style="color: #002147"> Koleksi </span><span style="color : #FF9900">Dipinjam</span></button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div style="overflow-x:auto;">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">No Peminjaman</th>
                    <th scope="col">Nomor ISBN</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Tanggal Pengembalian</th>
                    <th scope="col">Status</th>
                    <th scope="col">Perpanjangan</th>
                  </tr>
                </thead>
                <tbody>
                  @if (session()->has('success'))
                  <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                  </div>
                @endif
                @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
                  @foreach ($peminjamans as $peminjaman)
                  {{-- <a href="/home/sirkulasi/bebas-pustaka/detail/{{ $peminjaman->slug }}" class="btn btn-primary" style="float: right">BEBAS PUSTAKA</a> --}}
                  <tr> 
                    
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $peminjaman->no_peminjaman }}</td>
                  <td>{{ $peminjaman->katalogs->isbn }}</td>
                   <td>@if ($peminjaman->katalogs->isbn)
                    {{ $peminjaman->katalogs->title }}
                  @elseif ($peminjaman->bibliographies->isbn)
                     {{ $peminjaman->bibliographies->title }} </td>
                  @endif
                  <td>{{ $peminjaman->tgl_pinjam }}</td>
                  <td>{{ $peminjaman->tgl_kembali }}</td>
               
                  @if ($peminjaman->status->nama == 'Konfirmasi')
                  <td><span class="badge rounded-pill bg-success text-white">{{ $peminjaman->status->nama }}</span></td> 
                  @elseif ($peminjaman->status->nama == 'Kembali')
                  <td><span class="badge rounded-pill bg-primary text-white">{{ $peminjaman->status->nama }}</span></td>
                  @elseif ($peminjaman->status->nama == 'Pending')
                  <td><span class="badge rounded-pill bg-danger text-white">{{ $peminjaman->status->nama }}</span></td>
                  @elseif ($peminjaman->status->nama == 'Ditolak')
                  <td><span class="badge rounded-pill bg-secondary text-white">{{ $peminjaman->status->nama }}</span><br>{{ $peminjaman->alasan }}</td>
                  @else
                  <td><span class="badge rounded-pill bg-warning text-white">{{ $peminjaman->status->nama }}</span></td>
                  @endif
                  @if ($peminjaman->status->nama == 'Sedang Dipinjam')
                  @if ($peminjaman->id_perpanjangan == null)
                  <td>
                    <form action="/home/sirkulasi/ajukan-perpanjangan/{{ $peminjaman->slug }}" method="POST"
                        class="d-inline" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="hidden" value="Pengajuan" name="id_perpanjangan">
                        <button type="submit" class="badge bg-info border-0 text-white">Ajukan</button>
                        </form>
                      </td>
                      @endif
                      @if ($peminjaman->id_perpanjangan == 'Pengajuan')
                      <td><a class="badge rounded-pill bg-warning text-white text-decoration-none">Sedang Diajukan</a></td>
                      @endif
                      @if ($peminjaman->id_perpanjangan == 'Disetujui')
                      <td><a class="badge rounded-pill bg-success text-white text-decoration-none">Disetujui</a></td>
                      @elseif ($peminjaman->id_perpanjangan == 'Ditolak')
                      <td><a class="badge rounded-pill bg-secondary text-white text-decoration-none">Ditolak</a><br>{{ $peminjaman->alasan_ajuan }}</td>
                      @else
                      @endif
                  @else
                  @if ($peminjaman->id_perpanjangan == 'Disetujui')
                  <td><a class="badge rounded-pill bg-success text-white text-decoration-none">Disetujui</a></td>
                  @endif
                  <td></td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
            <!--PAGINATION-->
            <nav aria-label="Page navigation example" class="mt-3">
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  {{ $peminjamans->links() }}
                </li>
              </ul>
            </nav>
          </div>
        </div>
  
      </section>

      
</div>
@endsection