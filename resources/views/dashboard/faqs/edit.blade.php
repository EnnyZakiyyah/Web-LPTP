@extends('dashboard.layouts.main')
@section('container')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Welcome back, {{ auth()->user()->name }}</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">{{ $title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="card">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body table-border-style">
                <div class="col-lg-10">
                    <form method="POST" action="/dashboard/faqs/{{ $faq->slug }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-md-2 col-form-label">Judul Pertanyaan</label>
                            <div class="col-md-10">
                              <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $faq->name) }}" required autofocus/>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="slug" class="col-md-2 col-form-label">Id</label>
                            <div class="col-md-10">
                              <input class="form-control @error('slug') is-invalid @enderror" type="text" name="slug" id="slug" value="{{ old('slug', $faq->slug) }}" readonly/>
                            @error('slug')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="pertanyaan" class="col-md-2 col-form-label">Jawaban</label>
                            <div class="col-md-10">
                              <input class="form-control @error('pertanyaan') is-invalid @enderror" type="text" name="pertanyaan" id="pertanyaan" value="{{ old('pertanyaan', $faq->pertanyaan) }}"/>
                            @error('pertanyaan')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="float:right">Edit Data</button>
                      </form>
                </div>
            </div>
        </div>  
        <!-- [ Main Content ] end -->
    </div>
</div>

<script>
    //SLUG
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function() {
        fetch('/dashboard/faqs/checkSlug?name=' +name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

</script>
@endsection