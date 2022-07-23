@extends('home.layouts.main')

@section('container')
<div class="container">
    <h1 class="fs-7 fw-bold"><span style="color: #002147">{{ $title }} </span></h1>

    <!--Header-->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Faq</li>
        </ol>
    </nav>
    <section class="py-0 mt-3" style="margin-top:-5.8rem">
        <div class="faq_area section_padding_130" id="faq">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- FAQ Area-->
                    <div class="col-12 col-sm-10 col-lg-8">
                        <div class="accordion faq-accordian" id="faqAccordion">
                            @foreach ($faqs as $faq)
                            <div class="card border-0 wow fadeInUp" data-wow-delay="{{ $i = $loop->iteration }}00"
                                style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <div class="card-header" id="headingOne">
                                    <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne{{ $i }}"
                                        aria-expanded="true" aria-controls="collapseOne">{{ $faq->name }}<span
                                            class="lni-chevron-up"></span></h6>
                                </div>
                                <div class="collapse" id="collapseOne{{ $i }}" aria-labelledby="headingOne"
                                    data-parent="#faqAccordion">
                                    <div class="card-body">
                                        <p>{!! $faq->pertanyaan !!}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>

@endsection
