{{-- @extends('layout.app')
@section('content')
    @include('components.home-1')
    @include('components.home-cat')
    @include('components.home-footer')

@endsection --}}







 @extends('layout.app-testi')


@section('content')

    <nav class="navbar sticky-top shadow-sm navbar-expand-lg navbar-light py-2">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="img-fluid" src="{{asset('/images/customer review.jpg')}}" alt="" width="220px" height="80px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#header01" aria-controls="header01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="header01">
                <ul class="navbar-nav ms-auto mt-3 mt-lg-0 mb-3 mb-lg-0 me-4">
                    <li class="nav-item me-4 fs-4"><a class="nav-link fs-4" href="/">Home</a></li>
                    <li class="nav-item me-4 fs-4"><a class="nav-link fs-4" href="#">About</a></li>
                    <li class="nav-item me-4 fs-4"><a class="nav-link fs-4" href="#">Hotels</a></li>
                    <li class="nav-item me-4 fs-4"><a class="nav-link fs-4" href="#">Resturents</a></li>
                    <li class="nav-item fs-4"><a class="nav-link fs-4" href="#">Reviews</a></li>
                </ul>
                <div><a class="btn mt-3 bg-gradient-info" href="{{url('/userLogin')}}">User  Login</a></div><span><div><a class="btn mt-3 ms-2 bg-gradient-info" href="{{url('/adminLogin')}}">Admin  Login</a></div></span>
            </div>
        </div>
    </nav>





      


        <section class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 mx-auto text-center">
                        <span class="text-muted">Hotel List By Category</span>
                        <p class="lead text-muted">We are expecting your valuable reviews</p>
                    </div>
                </div>
                <br/>






            </div>
        </section>

        <br/>

        <section class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-5 mb-5 mb-lg-0">
                        <h2 class="fw-bold mb-5">Reach Out to Us: Let's Connect and Explore Opportunities Together</h2>
                        <h4 class="fw-bold">Address</h4>
                        <p class="text-muted mb-5">1686 Geraldine Lane New York, NY 10013</p>
                        <h4 class="fw-bold">Contact Us</h4>
                        <p class="text-muted mb-1">hello@wireframes.org</p>
                        <p class="text-muted mb-0">+ 7-843-672-431</p>
                    </div>
                    <div class="col-12 col-lg-6 offset-lg-1">
                        <form action="#">
                            <input class="form-control mb-3" type="text" placeholder="Name">
                            <input class="form-control mb-3" type="email" placeholder="E-mail">
                            <textarea class="form-control mb-3" name="message" cols="30" rows="10" placeholder="Your Message..."></textarea>
                            <button class="btn bg-gradient-primary w-100">Action</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>










        <footer class="py-5 bg-light">
            <div class="container text-center pb-5 border-bottom">
                <a class="d-inline-block mx-auto mb-4" href="#">


                    <img class="img-fluid" src="{{asset('/images/customer_review-removebg-preview.png')}}" alt="" width="220px" height="80px">
                </a>
                <ul class="d-flex flex-wrap justify-content-center align-items-center list-unstyled mb-4">
                    <li><a class="link-secondary me-4 fs-4" href="#">About</a></li>
                    <li><a class="link-secondary me-4 fs-4"  href="#">Hotels</a></li>
                    <li><a class="link-secondary me-4 fs-4" href="#">Resturents</a></li>
                    <li><a class="link-secondary fs-4" href="#">Reviews</a></li>
                </ul>
                <div>
                    <a class="d-inline-block me-4" href="#">
                        <img src="{{asset('/images/facebook.svg')}}">
                    </a>
                    <a class="d-inline-block me-4" href="#">
                        <img src="{{asset('/images/twitter.svg')}}">
                    </a>
                    <a class="d-inline-block me-4" href="#">
                        <img src="{{asset('/images/github.svg')}}">
                    </a>
                    <a class="d-inline-block me-4" href="#">
                        <img src="{{asset('/images/instagram.svg')}}">
                    </a>
                    <a class="d-inline-block" href="#">
                        <img src="{{asset('/images/linkedin.svg')}}">
                    </a>
                </div>
            </div>
            <div class="mb-5"></div>
            <div class="container">
                <p class="text-center">All rights reserved © Learn with Rabbil (LWR) 2023-2024</p>
            </div>
        </footer>

@endsection













