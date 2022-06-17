@extends('home.layouts.main')

@section('container')

<div class="container">
  <h1 class="fs-7 fw-bold"><span style="color: #002147">{{ $title }} </span></h1>
  
  <!--Header-->
  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-decoration-none" href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
    </ol>
  </nav>

    <section id="contact" class="contact">
        <div class="row">
            <div class="col-lg-5 d-flex align-items-stretch">
                <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Location:</h4>
                        <p> 
                          Jl. Raya Palur Km 5 Tegal Asri RT 04/VI Ngringo
                          Jaten - Karanganyar 57772 Jawa Tengah
                          Phone (0271) 826620, Fax (0271) 825107
                        </p>
                    </div>
                    <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p>lptp.surakarta.solo@gmail.com</p>
                    </div>         
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d506127.5836185457!2d110.33582538256263!3d-7.670058324404422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a17081cb85c5b%3A0xff3ce8bcfd37aba3!2sLPTP%20-%20Lembaga%20Pengembangan%20Teknologi%20Pedesaan%20Surakarta!5e0!3m2!1sid!2sid!4v1655388967060!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen"></iframe>
                </div>
            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
              <form action="{{ route('send.email') }}" method="POST" role="form" class="php-email-form2">
                @csrf
               <div class="row">
                 <div class="form-group col-md-6">
                   <label for="name">Your Name</label>
                   <input type="text" name="name" class="form-control" id="name" required>
                   @error('name')
                   <span class="text-danger"> {{ $message }} </span>
                   @enderror
                 </div>
                 <div class="form-group col-md-6">
                   <label for="email">Your Email</label>
                   <input type="email" class="form-control" name="email" id="email" required>
                   @error('email')
                   <span class="text-danger"> {{ $message }} </span>
                   @enderror
                 </div>
               </div>
             <div class="row">
             <div class="form-group col-md-6">
               <label for="phone">Your Phone</label>
               <input type="number" class="form-control" name="phone" id="phone" min="8" required>
               @error('phone')
               <span class="text-danger"> {{ $message }} </span>
               @enderror
             </div>
               <div class="form-group col-md-6">
                 <label for="subject">Subject</label>
                 <input type="text" class="form-control" name="subject" id="subject" required>
                 @error('subject')
                 <span class="text-danger"> {{ $message }} </span>
                 @enderror
               </div>
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
               <div class="text-center"><button type="submit">Send Message</button></div>
              
             </form>
            </div>
        </div>
    </section>

</div>

@endsection
