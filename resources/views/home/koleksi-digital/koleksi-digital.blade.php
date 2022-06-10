@extends('home.layouts.main')

@section('container')
<div class="container">
<h1 class="pt-5 mb-2 fs-7 fw-bold"><span style="color: #002147"> Koleksi Digital </span></h1>
    
    <!--Header-->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Koleksi Digital</li>
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


     <!--Koleksi Digital-->
  <section class="pt-2">

    <div class="container">
        <div class="row h-100 align-items-center">
            <div class="col-md-4 mb-4">
              <div class="card card-span text-white h-100" style="background-color: #F9F7F7; border : 1px solid #E5E5E5; "><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
                <div class="card-custom-avatar">
                    <img class="img-fluid" src="{{ asset('assets/img/sirkulasi/lord-of-the-ring.png') }}" alt="Avatar" />
                </div>
              </div>
                <div class="card-body">
                  <h6 class="pt-5">The Lord of The Rings is an epic high-fantasy</h6><a class="text-muted stretched-link text-decoration-none" style="font-size: 13px" href="#!">J.R.R Tolkien</a>
                </div>
            </div>
          <div class="col-md-4 mb-4">
            <div class="card card-span text-white h-100" style="background-color: #F9F7F7; border : 1px solid #E5E5E5; "><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
              <div class="card-custom-avatar">
                  <img class="img-fluid" src="{{ asset('assets/img/sirkulasi/lord-of-the-ring.png') }}" alt="Avatar" />
              </div>
            </div>
              <div class="card-body">
                <h6 class="pt-5">The Lord of The Rings is an epic high-fantasy</h6><a class="text-muted stretched-link text-decoration-none" style="font-size: 13px" href="#!">J.R.R Tolkien</a>
              </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card card-span text-white h-100" style="background-color: #F9F7F7; border : 1px solid #E5E5E5; "><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
              <div class="card-custom-avatar">
                  <img class="img-fluid" src="{{ asset('assets/img/sirkulasi/lord-of-the-ring.png') }}" alt="Avatar" />
              </div>
            </div>
              <div class="card-body">
                <h6 class="pt-5">The Lord of The Rings is an epic high-fantasy</h6><a class="text-muted stretched-link text-decoration-none" style="font-size: 13px" href="#!">J.R.R Tolkien</a>
              </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card card-span text-white h-100" style="background-color: #F9F7F7; border : 1px solid #E5E5E5; "><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
              <div class="card-custom-avatar">
                  <img class="img-fluid" src="{{ asset('assets/img/sirkulasi/lord-of-the-ring.png') }}" alt="Avatar" />
              </div>
            </div>
              <div class="card-body">
                <h6 class="pt-5">The Lord of The Rings is an epic high-fantasy</h6><a class="text-muted stretched-link text-decoration-none" style="font-size: 13px" href="#!">J.R.R Tolkien</a>
              </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card card-span text-white h-100" style="background-color: #F9F7F7; border : 1px solid #E5E5E5; "><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
              <div class="card-custom-avatar">
                  <img class="img-fluid" src="{{ asset('assets/img/sirkulasi/lord-of-the-ring.png') }}" alt="Avatar" />
              </div>
            </div>
              <div class="card-body">
                <h6 class="pt-5">The Lord of The Rings is an epic high-fantasy</h6><a class="text-muted stretched-link text-decoration-none" style="font-size: 13px" href="#!">J.R.R Tolkien</a>
              </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card card-span text-white h-100" style="background-color: #F9F7F7; border : 1px solid #E5E5E5; "><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
              <div class="card-custom-avatar">
                  <img class="img-fluid" src="{{ asset('assets/img/sirkulasi/lord-of-the-ring.png') }}" alt="Avatar" />
              </div>
            </div>
              <div class="card-body">
                <h6 class="pt-5">The Lord of The Rings is an epic high-fantasy</h6><a class="text-muted stretched-link text-decoration-none" style="font-size: 13px" href="#!">J.R.R Tolkien</a>
              </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card card-span text-white h-100" style="background-color: #F9F7F7; border : 1px solid #E5E5E5; "><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
              <div class="card-custom-avatar">
                  <img class="img-fluid" src="{{ asset('assets/img/sirkulasi/lord-of-the-ring.png') }}" alt="Avatar" />
              </div>
            </div>
              <div class="card-body">
                <h6 class="pt-5">The Lord of The Rings is an epic high-fantasy</h6><a class="text-muted stretched-link text-decoration-none" style="font-size: 13px" href="#!">J.R.R Tolkien</a>
              </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card card-span text-white h-100" style="background-color: #F9F7F7; border : 1px solid #E5E5E5; "><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
              <div class="card-custom-avatar">
                  <img class="img-fluid" src="{{ asset('assets/img/sirkulasi/lord-of-the-ring.png') }}" alt="Avatar" />
              </div>
            </div>
              <div class="card-body">
                <h6 class="pt-5">The Lord of The Rings is an epic high-fantasy</h6><a class="text-muted stretched-link text-decoration-none" style="font-size: 13px" href="#!">J.R.R Tolkien</a>
              </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card card-span text-white h-100" style="background-color: #F9F7F7; border : 1px solid #E5E5E5; "><center><img class="img-thumbnail" src="{{ asset('assets/img/sirkulasi/lord-rings-2.png') }}" alt="..." /></center>
              <div class="card-custom-avatar">
                  <img class="img-fluid" src="{{ asset('assets/img/sirkulasi/lord-of-the-ring.png') }}" alt="Avatar" />
              </div>
            </div>
              <div class="card-body">
                <h6 class="pt-5">The Lord of The Rings is an epic high-fantasy</h6><a class="text-muted stretched-link text-decoration-none" style="font-size: 13px" href="#!">J.R.R Tolkien</a>
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
  </section>
      
</div>
@endsection