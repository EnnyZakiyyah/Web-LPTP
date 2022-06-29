@extends('home.layouts.main')

@section('container')
      <!-- ==========================================-->
      <!-- <HEADER> begin============================-->

          <section class="pt-3">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-6 text-sm-start text-center py-6">
                  <h1 class="mb-4 fs-9 fw-bold">Selamat Datang di Perpustakaan LPTP Surakarta</h1>
                  <p class="mb-5 lead text-secondary">Tools tutorials, design and innovation experts, all<br class="d-none d-xl-block" />in one place! The most intuitive way to imagine<br class="d-none d-xl-block" />your next user experience.</p>
                  <form>
                    <div class="search rounded-pill w-xl-75 w-xxl-50 d-flex flex-end-center"><input type="text" class="form-control rounded-pill" placeholder="Search books, articles, keywords"> <i class="fa fa-search"></i></div>
                  </form>
                </div>
                <div class="col-md-6 text-end">
                  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
                    border-radius: 20px; -moz-border-radius: 5px;">
                     @foreach($hero as $key => $heroes)
                      <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                        <img src="{{asset('storage/' . $heroes->image)}}" class="d-block w-100" alt="...">
                      </div>
                      @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- <HEADER> close ============================-->
          <!-- ============================================-->
    
          <!-- ============================================-->
          <!-- <INFORMATION> begin ========================-->
    
            <section class="py-0 mt-3" style="margin-top:-5.8rem">
    
              <div class="container">
                <div class="row">
                  <div class="card-home card-span bg-secondary">
                    <div class="card-body-home">
                      <div class="row flex-center gx-0">
                        <div class="col-lg-4 col-xl-2 text-center text-xl-start"><img src="{{asset('assets/img/information/megaphone.png')}}" width="170" alt="..." /></div>
                        <div class="titles col-lg-8 col-xl-4">
                          <h1 class="text-light fs-lg-4 fs-xl-5">Our <br/><span style="color: #FF9900">Information !</span></h1>
                        </div>
                        <div class="col-lg-12 col-xl-6 order-1 text-center text-white">
                          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                              @foreach($informasis as $key => $informasi)
                              <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                <h5 class="display-5 text-light text-center text-xl-center">{{ $informasi->tanggal }}</h5>
                                <p>{{ $informasi->informasi }}</p>
                              </div>
                              @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
      </section>
      <!-- <INFORMATION> close ========================-->
      <!-- ============================================-->


      <!-- ============================================-->
      <!-- <TENTANG KAMI> begin ============================-->
        <section class="mt-5 pt-5" id="about-me">

          <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block" style="background-image:url({{asset('assets/img/category/shape.png')}});opacity:.5;">
          </div>
          <!--/.bg-holder-->

          
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <h2 class="mb-2 fs-7 fw-bold"><span style="color: #002147"> Tentang </span><span style="color : #FF9900">Kami</span></h2>
                <p class="mb-4 fw-medium text-secondary">
                  Perpustakaan  lptp merupakan unit kerja dari Yayasan LPTP. Perpustakaan LPTP menyediakan berbagai sumber informasi dan referensi bagi para staf dan komunitas LPTP. Perpustakaan ini diharapakan menjadi rumah belajar bagi seluruh staf dan komunitas yang ingin meningkatkan literasinya. Meningkatnya literasi akan mendukung lancarnya tugas kerja semua staf dan mitranya di berbagai tempat.
                </p>
                <p class="mb-4 fw-medium text-secondary">
                  Berbagai sarana literasi tersedia di perpustakaan LPTP dan secara bertahap terus ditingkatkan. Koleksi perpustakaan non digital maupun digital terus diupayakan penambahannya untuk memenuhi kebutuhan staf dan komunitas dari tahun ke tahun.
                </p>
                <h4 class="fs-1 fw-bold">Jam Buka</h4>
                <p class="mb-4 fw-medium text-secondary">08.00 – 16.00 </p>
                <h4 class="fs-1 fw-bold">Alamat</h4>
                <p class="mb-4 fw-medium text-secondary">Jl. Raya Palur Km 5 Tegal Asri RT 04/VI Ngringo<br />Jaten - Karanganyar 57772 Jawa Tengah<br/>Phone (0271) 826620, Fax (0271) 825107</p>
              </div>
              <div class="col-lg-6"><img class="img-fluid" src="assets/img/validation/validation.png" alt="" /></div>
            </div>
          </div><!-- end of .container-->
  
        </section>

      <!-- ============================================-->
      <!-- <LAYANAN KAMI> begin ============================-->
      <section class="pt-0 pt-md-9 mb-3" id="layanan-kami">

        <div class="container">
          <h1 class="fs-9 fw-bold mb-4 pb-5 text-center"><span style="color: #002147"> Layanan </span><span style="color : #FF9900">Kami</span></h1>
          <div class="row justify-content-center">
          </div>
          <div class="row">
            <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center">
              <div class="px-0 px-lg-3"><img class="img-fluid mb-4 " src="{{asset('assets/img/layanan/Pencarian.png')}}" width="105" height="106" alt="..." />
                <h3 class="h5 mb-4 font-base">Pencarian</h3>
                <p class="lh-lg">Mencari informasi mengenai buku</p>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center">
              <div class="px-0 px-lg-3"><img class="img-fluid mb-4" src="{{asset('assets/img/layanan/Koleksi-Digital.png')}}" width="116" height="106" alt="..." />
                <h3 class="h5 mb-4 font-base">Koleksi Digital</h3>
                <p class="lh-lg">Pengelolaan dan pencatatan data buku</p>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center">
              <div class="px-0 px-lg-3"><img class="img-fluid mb-4" src="{{asset('assets/img/layanan/Keanggotaan.png')}}" width="102" height="106" alt="..." />
                <h3 class="h5 mb-4 font-base">Keanggotaan</h3>
                <p class="lh-lg">Publish with Wiley Explore our resource library Learn about topics and trends</p>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center">
              <div class="px-0 px-lg-3"><img class="img-fluid mb-4" src="{{asset('assets/img/layanan/Sirkulasi.png')}}" width="95" height="106" alt="..." />
                <h3 class="h5 mb-4 font-base">Sirkulasi</h3>
                <p class="lh-lg">Mengatur jalannya kegiatan peminjaman, pengembalian, perpanjangan, dan reservasi koleksi perpustakaan</p>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
      <!-- <LAYANAN KAMI> close ============================-->
      <!-- ============================================-->


      <!-- ============================================-->
      <!-- <TATA TERTIB> begin ============================-->
        <section class="pt-0" id="tata-tertib">

          <div class="container">
            <div class="row">
              <div class="col-lg-6"><img class="img-fluid" src="{{asset('assets/img/marketer/marketer.png')}}" alt="" /></div>
              <div class="col-lg-6">
                <p class="fs-7 fw-bold mb-2"> <span style="color: #002147"> Tata <span style="color : #FF9900"> Tertib</span></p>
                <p class="mb-4 fw-medium text-secondary">
                  Tata Tertib Perpustakaan LPTP :
                </p>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="{{asset('assets/img/manager/tick.png')}}" width="35" alt="tick" />
                  <p class="fw-medium mb-0 text-secondary">Tas harus ditaruh di luar ruang perpustakaan.</p>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="{{asset('assets/img/manager/tick.png')}}" width="35" alt="tick" />
                  <p class="fw-medium mb-0 text-secondary">Masuk ruang perpustakaan hanya untuk membaca dan meminjam buku. Di larang melakukan hal lain selain itu.</p>
                </div>
                <div class="d-flex align-items-center mb-3"><img class="me-sm-4 me-2" src="{{asset('assets/img/manager/tick.png')}}" width="35" alt="tick" />
                  <p class="fw-medium mb-0 text-secondary"> Yang berhak meminjam buku adalah pemegang kartu anggota perpustakaan LPTP.</p>
                </div>
                <div class="d-flex align-items-center mb-3"><img class="me-sm-4 me-2" src="{{asset('assets/img/manager/tick.png')}}" width="35" alt="tick" />
                  <p class="fw-medium mb-0 text-secondary"> Peminjaman buku paling banyak dua buku dan waktunya satu minggu. Kelambatan pengembalian akan dikenai denda.</p>
                </div>
                <div class="d-flex align-items-center mb-3"><img class="me-sm-4 me-2" src="{{asset('assets/img/manager/tick.png')}}" width="35" alt="tick" />
                  <p class="fw-medium mb-0 text-secondary"> Buku perpustakaan dilarang di bawa keluar ruangan kecuali  dipinjam atau dengan izin.</p>
                </div>
                <div class="d-flex align-items-center mb-3"><img class="me-sm-4 me-2" src="{{asset('assets/img/manager/tick.png')}}" width="35" alt="tick" />
                  <p class="fw-medium mb-0 text-secondary"> Peminjaman buku dilakukan jam 08.00 sampai jam 16.00.</p>
                </div>
                <div class="d-flex align-items-center mb-3"><img class="me-sm-4 me-2" src="{{asset('assets/img/manager/tick.png')}}" width="35" alt="tick" />
                  <p class="fw-medium mb-0 text-secondary"> Harus tenang dan tertib selama di ruang perpustakaan. Dilarang membuat gaduh di ruang perpustakaan.</p>
                </div>
                <div class="d-flex align-items-center mb-3"><img class="me-sm-4 me-2" src="{{asset('assets/img/manager/tick.png')}}" width="35" alt="tick" />
                  <p class="fw-medium mb-0 text-secondary"> Mahasiswa dilarang merokok di ruang perpustakaan.</p>
                </div>
              </div>
            </div>
          </div><!-- end of .container-->
  
        </section>
      <!-- <TATA TERTIB> close ============================-->
      <!-- ============================================-->


      <!-- ============================================-->
      <!-- <BUKU TERBARU> begin ============================-->
        <section class="pt-5 pb-0 mt-5" id="buku-terbaru">
          
          <div class="container">
            <h1 class="fs-9 fw-bold mb-4 pb-4 text-center"><span style="color: #002147"> Buku </span><span style="color : #FF9900">Terbaru</span></h1>
       
              @if ($buku->count())
             
                    
                <div class="row h-100 align-items-center">
                  <div class="col-md-4 mb-4">
                    <div class="card-book card-span text-white h-100" style="background-color:#E5E5E5"><center><img class="img-thumbnail" src="{{ asset('storage/' . $buku[0]->image) }}" alt="..." /></center>
                      <div class="card-book-body ps-0" style="background-color:#ffffff">
                        <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">{{ $buku[0]->author->nama }}</a>|<span class="ms-1">{{ $buku[0]->created_at->diffForHumans() }}</span></p>
                        <h3 class="fw-bold">{{ $buku[0]->title }}</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-4">
                    <div class="card-book card-span text-white h-100" style="background-color:#E5E5E5"><center><img class="img-thumbnail" src="{{ asset('storage/' . $buku[1]->image) }}" alt="..." /></center>
                      <div class="card-book-body ps-0" style="background-color:#ffffff">
                        <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">{{ $buku[1]->author->nama }}</a>|<span class="ms-1">{{ $buku[1]->created_at->diffForHumans() }}</span></p>
                        <h3 class="fw-bold">{{ $buku[1]->title }}</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-4">
                    <div class="card-book card-span text-white h-100" style="background-color:#E5E5E5"><center><img class="img-thumbnail" src="{{ asset('storage/' . $buku[2]->image) }}" alt="..." /></center>
                      <div class="card-book-body ps-0" style="background-color:#ffffff">
                        <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">{{ $buku[2]->author->nama }}</a>|<span class="ms-1">{{ $buku[2]->created_at->diffForHumans() }}</span></p>
                        <h3 class="fw-bold">{{ $buku[2]->title }}</h3>
                      </div>
                    </div>
                  </div>
                </div>
              @endif

              
          </div><!-- end of .container-->
  
        </section>
        <!-- <BUKU TERBARU> close ============================-->
        <!-- ============================================-->
      

      <!-- ============================================-->
      <!-- <QUESTION> begin ============================-->
        <section class="py-md-11 py-3" id="question">

          <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block background-position-top" style="background-image:url(assets/img/superhero/oval.png);opacity:.5; background-position: top !important ;">
          </div>
          <!--/.bg-holder-->
  
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6 text-center">
                <h1 class="fw-bold mb-4 fs-7">Ada Pertanyaan?</h1>
                <p class="mb-5 text-info fw-medium">Apakah ada pertanyaan mengenai<br />peminjaman, pengembalian, perpanjangan, atau yang lain?</p>
                <a href="/contact-us" class="btn btn-warning btn-md">Contact Us</a>
              </div>
            </div>
          </div><!-- end of .container-->
  
        </section>
        <!-- <QUESTION> close ============================-->
        <!-- ============================================-->


@endsection