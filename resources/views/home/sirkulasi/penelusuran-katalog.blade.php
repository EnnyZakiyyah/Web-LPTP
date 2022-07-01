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
                    href="/home/sirkulasi/penelusuran-katalog">Penelusuran Katalog</a></li>
            <li class="breadcrumb-item active" aria-current="page">Semua</li>
        </ol>
    </nav>

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
    @if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <!--Penelusuran Katalog-->
    @if ($katalogs->count())
    <section class="pt-2">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($katalogs as $katalog)
            <div class="col mb-5" >
                <div class="card-katalog">
                    <img src="{{ asset('storage/' . $katalog->image) }}" class="card-img-top" alt="...">
                    <div class="contentBx">
                        <h5 class="card-title">{{ $katalog->title }}</h5>
                        <p class="mt-5" style="color: white !important; padding-top:10px;">by <a
                                href="/home/sirkulasi/penelusuran-katalog?author={{ $katalog->author->slug }}"
                                class="text-primary" style="font-size: 15px;">{{ $katalog->author->nama }}</a></p>
                        <p style="font-size: 13px; color: white !important">2016</p>
                        <p style="color: white !important">{!! $katalog->excerpt !!}
                            <a href="/home/sirkulasi/penelusuran-katalog/detail/{{ $katalog->slug }}"
                                class="text-primary">Read
                                More...</a></p>
                        <a type="button" class="btn btn-outline-secondary btn-sm" style="font-weight: bold;"
                            href="/home/sirkulasi/penelusuran-katalog?category={{ $katalog->category->slug }}">{{ $katalog->category->name }}</a>
                        @if ($katalog->jumlah == 0)
                        <a type="button" class="btn btn-outline-danger btn-sm" style="font-weight: bold;">Full</a>
                        @else
                        <a type="button" class="btn btn-outline-warning btn-sm" style="font-weight: bold;"
                            href="/home/sirkulasi/penelusuran-katalog/{{ $katalog->slug }}">Pinjam Buku</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>



        @else
        <p class="text-center fs-4">No Post Found.</p>
        @endif

        <!--PAGINATION-->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    {{ $katalogs->links() }}
                </li>
            </ul>
        </nav>
    </section>
</div>
</div>

@endsection
