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


    <!--Pengembalian-Buku-->
  <section class="pt-2">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><span style="color: #002147"> Koleksi </span><span style="color : #FF9900">Peminjaman</span></button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div style="overflow-x:auto;">
            <div class="container pt-1 pb-5">
                <div class="row pt-5 pb-5">
                  <div class="col-4">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <img class="card-img-top" src="{{asset('assets/img/sirkulasi/lord-rings-2.png')}}" alt="" />
                        </div>
                        <div class="col-4 pt-5 pb-5">
                            <p><span class="badge rounded-pill bg-primary pt-1">Sudah Kembali</span></p>                            
                            <p><span class="badge rounded-pill bg-warning">Buku Hilang</span></p>
                        </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <img class="card-img-top" src="{{asset('assets/img/sirkulasi/lord-rings-2.png')}}" alt="" />
                        </div>
                        <div class="col-4 pt-5 pb-5">
                            <p><span class="badge rounded-pill bg-primary pt-1">Sudah Kembali</span></p>                            
                            <p><span class="badge rounded-pill bg-success">Tepat Waktu</span></p>
                        </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <img class="card-img-top" src="{{asset('assets/img/sirkulasi/lord-rings-2.png')}}" alt="" />
                        </div>
                        <div class="col-4 pt-5 pb-5">
                            <p><span class="badge rounded-pill bg-primary pt-1">Sudah Kembali</span></p>                            
                            <p><span class="badge rounded-pill bg-warning">Buku Hilang</span></p>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row pt-5 pb-5">
                    <div class="col-4">
                      <div class="row justify-content-center">
                          <div class="col-4">
                              <img class="card-img-top" src="{{asset('assets/img/sirkulasi/lord-rings-2.png')}}" alt="" />
                          </div>
                          <div class="col-4 pt-5 pb-5">
                              <p><span class="badge rounded-pill bg-primary pt-1">Sudah Kembali</span></p>                            
                              <p><span class="badge rounded-pill bg-danger">Terlambat</span></p>
                          </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="row justify-content-center">
                          <div class="col-4">
                              <img class="card-img-top" src="{{asset('assets/img/sirkulasi/lord-rings-2.png')}}" alt="" />
                          </div>
                          <div class="col-4 pt-5 pb-5">
                              <p><span class="badge rounded-pill bg-primary pt-1">Sudah Kembali</span></p>                            
                              <p><span class="badge rounded-pill bg-success">Tepat Waktu</span></p>
                          </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="row justify-content-center">
                          <div class="col-4">
                              <img class="card-img-top" src="{{asset('assets/img/sirkulasi/lord-rings-2.png')}}" alt="" />
                          </div>
                          <div class="col-4 pt-5 pb-5">
                              <p><span class="badge rounded-pill bg-primary pt-1">Sudah Kembali</span></p>                            
                              <p><span class="badge rounded-pill bg-danger">Terlambat</span></p>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row pt-5">
                    <div class="col-4">
                      <div class="row justify-content-center">
                          <div class="col-4">
                              <img class="card-img-top" src="{{asset('assets/img/sirkulasi/lord-rings-2.png')}}" alt="" />
                          </div>
                          <div class="col-4 pt-5 pb-5">
                              <p><span class="badge rounded-pill bg-primary pt-1">Sudah Kembali</span></p>                            
                              <p><span class="badge rounded-pill bg-warning">Buku Hilang</span></p>
                          </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="row justify-content-center">
                          <div class="col-4">
                              <img class="card-img-top" src="{{asset('assets/img/sirkulasi/lord-rings-2.png')}}" alt="" />
                          </div>
                          <div class="col-4 pt-5 pb-5">
                              <p><span class="badge rounded-pill bg-primary pt-1">Sudah Kembali</span></p>                            
                              <p><span class="badge rounded-pill bg-danger">Terlambat</span></p>
                          </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="row justify-content-center">
                          <div class="col-4">
                              <img class="card-img-top" src="{{asset('assets/img/sirkulasi/lord-rings-2.png')}}" alt="" />
                          </div>
                          <div class="col-4 pt-5 pb-5">
                              <p><span class="badge rounded-pill bg-primary pt-1">Sudah Kembali</span></p>                            
                              <p><span class="badge rounded-pill bg-warning">Buku Hilang</span></p>
                          </div>
                      </div>
                    </div>
                  </div>
            </div>

            <!--PAGINATION-->
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
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


      <!-- ============================================-->
      <!-- <BUKU TERBARU> begin ============================-->
        <section class="pt-5 pb-0 mt-5" id="buku-terbaru">

          <div class="container">
            <h1 class="fs-9 fw-bold mb-4 pb-4 text-center"><span style="color: #002147"> Buku </span><span style="color : #FF9900">Terbaru</span></h1>
          <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row h-100 align-items-center">
                  <div class="col-md-4 mb-4">
                    <div class="card-book card-span text-white h-100" style="background-color:#E5E5E5"><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
                      <div class="card-book-body ps-0" style="background-color:#ffffff">
                        <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                        <h3 class="fw-bold">Increasing Prosperity With Positive Thinking</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-4">
                    <div class="card-book card-span text-white h-100" style="background-color:#E5E5E5"><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
                      <div class="card-book-body ps-0" style="background-color:#ffffff">
                        <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                        <h3 class="fw-bold">Increasing Prosperity With Positive Thinking</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-4">
                    <div class="card-book card-span text-white h-100" style="background-color:#E5E5E5"><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
                      <div class="card-book-body ps-0" style="background-color:#ffffff">
                        <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                        <h3 class="fw-bold">Increasing Prosperity With Positive Thinking</h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row h-100 align-items-center">
                  <div class="col-md-4 mb-4">
                    <div class="card-book card-span text-white h-100" style="background-color:#E5E5E5"><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
                      <div class="card-book-body ps-0" style="background-color:#ffffff">
                        <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                        <h3 class="fw-bold">Increasing Prosperity With Positive Thinking</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-4">
                    <div class="card-book card-span text-white h-100" style="background-color:#E5E5E5"><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
                      <div class="card-book-body ps-0" style="background-color:#ffffff">
                        <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                        <h3 class="fw-bold">Increasing Prosperity With Positive Thinking</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-4">
                    <div class="card-book card-span text-white h-100" style="background-color:#E5E5E5"><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
                      <div class="card-book-body ps-0" style="background-color:#ffffff">
                        <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                        <h3 class="fw-bold">Increasing Prosperity With Positive Thinking</h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row h-100 align-items-center">
                  <div class="col-md-4 mb-4">
                    <div class="card-book card-span text-white h-100" style="background-color:#E5E5E5"><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
                      <div class="card-book-body ps-0" style="background-color:#ffffff">
                        <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                        <h3 class="fw-bold">Increasing Prosperity With Positive Thinking</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-4">
                    <div class="card-book card-span text-white h-100" style="background-color:#E5E5E5"><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
                      <div class="card-book-body ps-0" style="background-color:#ffffff">
                        <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                        <h3 class="fw-bold">Increasing Prosperity With Positive Thinking</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-4">
                    <div class="card-book card-span text-white h-100" style="background-color:#E5E5E5"><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
                      <div class="card-book-body ps-0" style="background-color:#ffffff">
                        <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                        <h3 class="fw-bold">Increasing Prosperity With Positive Thinking</h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- end of .container-->
  
        </section>
        <!-- <BUKU TERBARU> close ============================-->
        <!-- ============================================-->
      
</div>
@endsection