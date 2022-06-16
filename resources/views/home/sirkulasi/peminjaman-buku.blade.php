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
    
    <!--Search-->
    <section class="pt-5">
      <div class="row">
        <div class="col-md-auto mt-2">
          <form>
            <div class="search rounded-pill"><input type="text" class="form-control rounded-pill" placeholder="Search books, articles, keywords"> <i class="fa fa-search"></i></div>
          </form>
        </div>
        <div class="col col-lg-3 mt-2">
          <form>
            <div class="search rounded-pill"><input type="text" class="form-control rounded-pill" placeholder="Judul"> <i class="fa fa-search"></i></div>
          </form>
        </div>
        <div class="col-md-auto mt-2">
          <form>
            <select class="form-select rounded-pill" aria-label="Default select example">
              <option selected>Jenis</option>
              <option value="1">Booklet</option>
              <option value="2">Buku</option>
              <option value="3">Laporan Program</option>
              <option value="4">Laporan TA</option>
              <option value="5">Majalah</option>
              <option value="6">Softfile</option>
            </select>
          </form>
        </div>
        <div class="col-md-auto mt-2">
          <form>
              <button class="btn btn-search " type="submit">Search</button>
          </form>
        </div>
      </div>
  </section>


    <!--Koleksi-Dipinjam-->
  <section class="pt-2">
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
                  <th scope="col">RFID</th>
                  <th scope="col">Nomor ISBN</th>
                  <th scope="col">Tanggal Peminjaman</th>
                  <th scope="col">Tanggal Pengembalian</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr> 
                  <th scope="row">1</th>
                  <td>000851829794</td>
                  <td>9792029710</td>
                  <td>20 Maret 2022</td>
                  <td>27 Maret 2022</td>
                  <td><span class="badge rounded-pill bg-warning text-white">Sedang Dipinjam</span></td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>000851829794</td>
                  <td>9792029710</td>
                  <td>01 April 2022</td>
                  <td>08 April 2022</td>
                  <td><span class="badge rounded-pill bg-success text-white">Konfirmasi</span></td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>000851829794</td>
                  <td>9792029710</td>
                  <td>30 Maret 2022</td>
                  <td>06 April 2022</td>
                  <td><span class="badge rounded-pill bg-danger text-white">Pending</span></td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>000851829794</td>
                  <td>9792029710</td>
                  <td>30 Maret 2022</td>
                  <td>06 April 2022</td>
                  <td><span class="badge rounded-pill bg-danger text-white">Pending</span></td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>000851829794</td>
                  <td>9792029710</td>
                  <td>30 Maret 2022</td>
                  <td>06 April 2022</td>
                  <td><span class="badge rounded-pill bg-danger text-white">Pending</span></td>
                </tr>
              </tbody>
            </table>
          </div>
            <!--PAGINATION-->
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center mt-5">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </section>

      
</div>
@endsection