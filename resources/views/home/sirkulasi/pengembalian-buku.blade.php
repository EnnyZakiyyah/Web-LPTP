@extends('home.layouts.main')

@section('container')
<div class="container">
<h1 class="pt-5 mb-2 fs-7 fw-bold"><span style="color: #002147"> Sirkulasi </span></h1>
    
    <!--Header-->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pengembalian Buku</li>
      </ol>
    </nav>
  
    <!--Search-->
    <section class="pt-5">
      <form action="/home/sirkulasi/penelusuran-katalog" class="d-flex">
        <div class="row">
            <div class="col-sm-auto mt-2">
                <div class="search rounded-pill"><input type="text" class="form-control rounded-pill"
                        placeholder="Search books, articles, keywords" name="search"
                        value="{{ request('search') }}"> <i class="fa fa-search"></i></div>
            </div>
            @if (request('category'))
            <input type="hidden" class="form-control rounded-pill" placeholder="Search books, articles, keywords"
                name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
            <input type="hidden" class="form-control rounded-pill" placeholder="Search books, articles, keywords"
                name="author" value="{{ request('author') }}">
            @endif
            <div class="col-md-auto mt-2">
                <button class="btn btn-search " type="submit">Search</button>
            </div>
        </div>
    </form>
  </section>


    <!--Pengembalian-Buku-->
    @if ($pengembalians->count())
    <section class="pt-2">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><span style="color: #002147"> Koleksi </span><span style="color : #FF9900">Dipinjam</span></button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
         
          <table class="table table-hover">
            <div class="row row-cols-1 row-cols-md-3 g-4">
              @foreach ($pengembalians as $pengembalian)
              <div class="pt-5">
              <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                      <img src="{{ asset('storage/' . $pengembalian->katalogs->image) }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">{{ $pengembalian->katalogs->title }}</h5>
                        <p class="card-text">{!! $pengembalian->katalogs->excerpt !!}</p>
                        @if ($pengembalian->status->nama == 'Kembali')
                        <span class="badge rounded-pill bg-primary text-white">{{ $pengembalian->status->nama }}</span>
                        @endif
                        @if ($pengembalian->kondisi->nama == 'Bagus')
                        <span class="badge rounded-pill bg-success text-white">{{  $pengembalian->kondisi->nama }}</span>
                        @elseif ($pengembalian->kondisi->nama == 'Hilang')
                        <span class="badge rounded-pill bg-danger text-white">{{  $pengembalian->kondisi->nama }}</span>
                        @else
                        <span class="badge rounded-pill bg-warning text-white">{{  $pengembalian->kondisi->nama }}</span>
                        @endif
                        @if ($pengembalian->denda != 0)
                        <span class="badge rounded-pill bg-danger text-white mt-3">Denda @currency($pengembalian->denda)</span>
                        @endif
                      </div>
                      <div class="card-footer">
                        <small class="text-muted">
                          Tanggal Pengembalian : {{ $pengembalian->tgl_pengembalian }}
                        </small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                @endforeach
            </div>
               
                
           
          </table>
    
      </div>
    </div>
      
    </section>
    
    @else
    <p class="text-center fs-4">No Post Found.</p>
    @endif
    <!--PAGINATION-->
    <nav aria-label="Page navigation example" class="mt-3">
      <ul class="pagination justify-content-center">
        <li class="page-item">
          {{-- {{ $peminjamans->links() }} --}}
        </li>
      </ul>
    </nav>
      
</div>
@endsection