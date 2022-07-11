@extends('home.layouts.main')

@section('container')
<div class="container">
  
<h1 class="pt-5 mb-2 fs-7 fw-bold"><span style="color: #002147"> Sirkulasi </span></h1>
    <!--Header-->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Bebas Pustaka</li>
      </ol>
    </nav> 

    <!--Koleksi-Dipinjam-->
  <section class="pt-2">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><span style="color: #002147"> Bebas </span><span style="color : #FF9900">Pustaka</span></button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div style="overflow-x:auto;">
            <h5>Syarat dan Ketentuan</h5> 
            <br>
            <p>1. Buku yang telah dipinjam telah dikembalikan semua</p>
            <p>2. Buku yang hilang (jika ada) telah diganti sesaui dengan ketentuan</p>
            <p>3. Tidak memiliki tanggungan denda yang belum dibayarkan.</p>
            <p>4. Ketentuan bisa di download @foreach ($pustaka as $pustakas)
              <a href="/home/sirkulasi/bebas-pustaka/detail/{{ $pustakas->slug }}">disini</a>
             @endforeach
          </p>
            </p><span style="color: #002147">Ketentuan</span> ini berlaku untuk Perpustakaan LPTP Surakarta.
            <br>
            <br>
            <br>
            <p>Surakarta,  {{ now()->isoFormat('D MMMM Y') }}
            </p>
            <br>
            <p>Petugas</p>

            </div>
            <!--PAGINATION-->
            <nav aria-label="Page navigation example" class="mt-3">
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  {{-- {{ $pusta->links() }} --}}
                </li>
              </ul>
            </nav>
          </div>
        </div>
  
      </section>

      
</div>
@endsection