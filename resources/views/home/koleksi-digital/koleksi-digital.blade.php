@extends('home.layouts.main')

@section('container')
<div class="container">
    <h1 class="pt-5 mb-2 fs-7 fw-bold"><span style="color: #002147">{{ $title }} </span></h1>

    <!--Header-->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="/">Home</a></li>
            <li class="breadcrumb-item"><a class="text-decoration-none"
                    href="/home/koleksi-digital">Koleksi Digital</a></li>
            <li class="breadcrumb-item active" aria-current="page">Semua</li>
        </ol>
    </nav>

    <section class="pt-5">
        <form action="/home/koleksi-digital" class="d-flex">
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
    @if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <!--Penelusuran Katalog-->
    @if ($koleksidigitals->count())
    <section class="pt-2">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($koleksidigitals as $koleksidigital)
            <div class="col mb-5" >
                <div class="card-katalog" style="cursor: pointer">
                    <img src="{{ asset('storage/' . $koleksidigital->image) }}" class="card-img-top" alt="...">
                    <div class="contentBx">
                        <h5 class="card-title">{{ $koleksidigital->title }}</h5>
                        <p class="mt-5" style="color: white !important; padding-top:10px;">by <a
                                class="text-primary" style="font-size: 15px;">{{ $koleksidigital->author_id}}</a></p>
                        <p style="font-size: 13px; color: white !important">{{ $koleksidigital->tahun_terbit}}</p>
                        <p style="color: white !important">{!! $koleksidigital->excerpt !!}
                            <a href="/home/koleksi-digital/detail/{{ $koleksidigital->slug }}"
                                class="text-primary">Read
                                More...</a></p>
                        <a type="button" class="btn btn-outline-secondary btn-sm" style="font-weight: bold;"
                            href="/home/koleksi-digital?category={{ $koleksidigital->category->slug }}">{{ $koleksidigital->category->name }}</a>
                        <a type="button" class="btn btn-outline-warning btn-sm" style="font-weight: bold;" href="/home/koleksi-digital/read/{{ $koleksidigital->slug }}">Baca</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>



        @else
        <p class="text-center fs-4">No Post Found.</p>
        @endif

    </section>
    <!-- ============================================-->
<!-- <BUKU FAVORIT> begin ============================-->
<section class="pt-5 pb-0 mt-5" id="buku-favorit">

    <div class="container">
        <h1 class="fs-9 fw-bold mb-4 pb-4 text-center"><span style="color: #002147"> Buku </span><span
                style="color : #FF9900">Favorit</span></h1>

    @if ($favorit->count())
    @if($favorit[0]->views != 0)
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col mb-5">
            <a href="/home/sirkulasi/penelusuran-katalog/detail/{{ $favorit[0]->slug }}">
                <div class="card-katalog" style="cursor: pointer;">
                    <div><a class="text-white text-decoration-none" style="position: absolute; background-color:rgba(100, 95, 95, 0.404); float:bottom">Terakhir dibaca sebanyak {{ $favorit[0]->views }} kali </a></div>
                    <img src="{{ asset('storage/' . $favorit[0]->image) }}" class="card-img-top" alt="...">
                    <div class="contentBx-terbaru">
                        <h5 class="card-title" style="padding-left:5px; padding-right:5px">{{ $favorit[0]->title }}</h5>
                        <a href="/home/sirkulasi/penelusuran-katalog?author={{ $favorit[0]->author_id }}"
                            class="text-primary" style="font-size: 15px;">{{ $favorit[0]->author_id }}</a>
                    </div>
                </div>
            </a>
        </div>
        @endif
        @if($favorit[1]->views != 0)
        <div class="col mb-5">
            <a href="/home/sirkulasi/penelusuran-katalog/detail/{{ $favorit[1]->slug }}">
                <div class="card-katalog" style="cursor: pointer;">
                    <div><a class="text-white text-decoration-none" style="position: absolute; background-color:rgba(100, 95, 95, 0.404); float:bottom">Terakhir dibaca sebanyak {{ $favorit[1]->views }} kali </a></div>
                    <img src="{{ asset('storage/' . $favorit[1]->image) }}" class="card-img-top" alt="...">
                    <div class="contentBx-terbaru">
                        <h5 class="card-title" style="padding-left:5px; padding-right:5px">{{ $favorit[1]->title }}</h5>
                        <a href="/home/sirkulasi/penelusuran-katalog?author={{ $favorit[1]->author_id }}"
                            class="text-primary" style="font-size: 15px;">{{ $favorit[1]->author_id}}</a>
                    </div>
                </div>
            </a>
        </div>
        @endif
        @if($favorit[2]->views != 0)
        <div class="col mb-5">
            <a href="/home/sirkulasi/penelusuran-katalog/detail/{{ $favorit[2]->slug }}">
                <div class="card-katalog" style="cursor: pointer;">
                    <div><a class="text-white text-decoration-none" style="position: absolute; background-color:rgba(100, 95, 95, 0.404); float:bottom">Terakhir dibaca sebanyak {{ $favorit[2]->views }} kali </a></div>
                    <img src="{{ asset('storage/' . $favorit[2]->image) }}" class="card-img-top" alt="...">
                    <div class="contentBx-terbaru">
                        <h5 class="card-title" style="padding-left:5px; padding-right:5px">{{ $favorit[2]->title }}</h5>
                        <a href="/home/sirkulasi/penelusuran-katalog?author={{ $favorit[2]->author_id }}"
                            class="text-primary" style="font-size: 15px;">{{ $favorit[2]->author_id }}</a>
                    </div>
                </div>
            </a>
        </div>
        @endif
    </div>

  
    @endif


    </div><!-- end of .container-->

</section>
<!-- <BUKU FAVORIT> close ============================-->
<!-- ============================================-->
</div>
<!--PAGINATION-->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            {{ $koleksidigitals->links() }}
        </li>
    </ul>
</nav>


@endsection
