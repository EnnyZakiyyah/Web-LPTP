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
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="card">
            <h5 class="card-header">Tambah Data Penelusuran Katalog</h5>
            <div class="card-body table-border-style">
                <div class="col-lg-10">
                    <form method="POST" action="/dashboard/sirkulasi/katalogs" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="title" class="col-md-2 col-form-label">Title</label>
                            <div class="col-md-10">
                              <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}" required autofocus/>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="slug" class="col-md-2 col-form-label">Slug</label>
                            <div class="col-md-10">
                              <input class="form-control @error('slug') is-invalid @enderror" type="text" name="slug" id="slug" value="{{ old('slug') }}" readonly/>
                            @error('slug')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                                <label for="category" class="col-md-2 col-form-label">Category</label>
                                <div class="col-md-10">
                                <select class="form-control" id="category" name="category_id">
                                    @foreach ($categories as $category)
                                    @if (old('category_id') == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="author" class="col-md-2 col-form-label">Penulis</label>
                            <div class="col-md-10">
                                {{-- <select class="form-control" id="author" name="author_id">
                                    @foreach ($authors as $author)
                                    @if (old('author_id') == $author->id)
                                    <option value="{{ $author->id }}" selected>{{ $author->nama }}</option>
                                    @else
                                    <option value="{{ $author->id }}">{{ $author->nama }}</option>
                                    @endif
                                    @endforeach
                                </select> --}}
                                <div class="search_select_box">
                                <select data-live-search="true" class="form-control" id="author" name="author_id">
                                    @foreach ($authors as $author)
                                    @if (old('author_id') == $author->id)
                                    <option value="{{ $author->id }}" selected>{{ $author->nama }}</option>
                                    @else
                                    <option value="{{ $author->id }}">{{ $author->nama }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="dropdown">
                                    <button onclick="myFunction()" class="dropbtn">Dropdown</button>
                                    <div id="myDropdown" class="dropdown-content">
                                      <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                                      @foreach ($authors as $author)
                                      @if (old('author_id') == $author->id)
                                      <a href="{{ $author->id }}" value="{{ $author->id }}">{{ $author->nama }}</a>
                                      @else
                                      <a href="{{ $author->id }}" value="{{ $author->id }}">{{ $author->nama }}</a>
                                      @endif
                                      @endforeach
                                    </div>
                                  </div>
                                  
                            </div>
                        </div>
                          <div class="mb-3 row">
                            <label for="edisi" class="col-md-2 col-form-label">Edisi</label>
                            <div class="col-md-10">
                              <input class="form-control" type="text" name="edisi" id="edisi" value="{{ old('edisi') }}"/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="isbn" class="col-md-2 col-form-label">ISBN</label>
                            <div class="col-md-10">
                              <input class="form-control" type="text" name="isbn" id="isbn" value="{{ old('isbn') }}"/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="penerbit" class="col-md-2 col-form-label">Penerbit</label>
                            <div class="col-md-10">
                              <input class="form-control" type="text" name="penerbit" id="penerbit" value="{{ old('penerbit') }}"/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tempat_terbit" class="col-md-2 col-form-label">Tempat Terbit</label>
                            <div class="col-md-10">
                              <input class="form-control" type="text" name="tempat_terbit" id="tempat_terbit" value="{{ old('tempat_terbit') }}"/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tahun_terbit" class="col-md-2 col-form-label">Tahun Terbit</label>
                            <div class="col-md-10">
                              <input class="form-control" type="year" name="tahun_terbit" id="tahun_terbit" value="{{ old('tahun_terbit') }}"/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jumlah" class="col-md-2 col-form-label">Jumlah</label>
                            <div class="col-md-10">
                              <input class="form-control" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" required/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="bahasa" class="col-md-2 col-form-label">Bahasa</label>
                            <div class="col-md-10">
                              <input class="form-control" type="text" name="bahasa" id="bahasa" value="{{ old('bahasa') }}"/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="lokasi" class="col-md-2 col-form-label">Lokasi</label>
                            <div class="col-md-10">
                              <input class="form-control" type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}"/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="image" class="col-md-2 col-form-label">Upload Gambar</label>
                            <div class="col-md-10">
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()"/>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                              @enderror
                            </div>
                        </div>
                          <div class="mb-3 row">
                            <label for="body" class="col-md-2 col-form-label">Sinopsis</label>
                             <div class="col-md-10">
                                 <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                                 <trix-editor input="body"></trix-editor>
                                 @error('body')
                                 <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                          </div>
                        <button type="submit" class="btn btn-primary" style="float:right">Tambah Data</button>
                      </form>
                </div>
            </div>
        </div>  
        <!-- [ Main Content ] end -->
    </div>
</div>

<script>
    //SLUG
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/sirkulasi/katalogs/checkSlug?title=' +title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    //TRIX-EDITOR
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    // IMAGE
    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }

    }
    //DROPDOWN ATAS
    $(document).ready(function(){
        $('select').selectpicker();
        $('.search_select_box select').selectpicker();
    })

    //Dropdown
    function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}

</script>
@endsection