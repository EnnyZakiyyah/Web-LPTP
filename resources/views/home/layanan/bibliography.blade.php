@extends('home.layouts.main')

@section('container')
<div class="container">
<h1 class="pt-5 mb-2 fs-7 fw-bold"><span style="color: #002147"> Layanan </span></h1>
    
    <!--Header-->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Bibliography</li>
      </ol>
    </nav>
  
    <!--Search-->
    <section class="pt-5">
    <div class="row">
        <div class="col-5">
            <form>
                <div class="search rounded-pill"><input type="text" class="form-control rounded-pill" placeholder="Search books, articles, keywords"> <i class="fa fa-search"></i></div>
            </form>
        </div>
        <div class="col-2">
            <form>
                <div class="search rounded-pill"><input type="text" class="form-control rounded-pill" placeholder="Judul"> <i class="fa fa-search"></i></div>
            </form>
        </div>
        <div class="col-3">
            <form>
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
            </form>
        </div>
        <div class="col-2">
            <form>
                <button class="btn btn-search " type="submit">Search</button>
            </form>
        </div>
    </div>
  </section>


     </div>
@endsection