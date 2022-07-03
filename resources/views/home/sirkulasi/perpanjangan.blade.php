@extends('home.layouts.main')

@section('container')

<div class="container">
  <h1 class="fs-7 fw-bold"><span style="color: #002147">{{ $title }} </span></h1>
  
  <!--Header-->
  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-decoration-none" href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Perpanjangan</li>
    </ol>
  </nav>

    <section id="contact" class="contact">
        <div class="row">
            <div class="col-md-2 d-flex align-items-stretch">
            </div>

            <div class="col-md-8 d-flex align-items-stretch">
              <form action="{{ route('send.perpanjangan') }}" method="POST" role="form" class="php-email-form2">
                @csrf
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                    @error('name')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                  </div>
                 
                    {{-- <label for="name">Subject</label> --}}
                    <input type="hidden" name="subject" class="form-control" id="subject" value="Ajuan Perpanjangan" required>
                    @error('subject')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                
                  <div class="form-group col-md-6">
                    <label for="email">Your Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                    @error('email')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                  </div>
                </div>
              <div class="row">
              <div class="form-group col-md-12">
                <label for="phone">Your Phone</label>
                <input type="number" class="form-control" name="phone" id="phone" min="8" required>
                @error('phone')
                <span class="text-danger"> {{ $message }} </span>
                @enderror
              </div>
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea class="form-control" name="pesan" rows="10" required></textarea>
                  @error('pesan')
                  <span class="text-danger"> {{ $message }} </span>
                  @enderror
                </div>
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
                @if (session()->has('error'))
                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     {{ session('error') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
                @endif
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send</button></div>
   
              
              
             </form>
            </div>
            <div class="col-md-1 d-flex align-items-stretch">
            </div>
        </div>
    </section>

</div>

@endsection
