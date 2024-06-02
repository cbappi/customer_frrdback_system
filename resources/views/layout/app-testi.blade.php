<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Review System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{asset('/favicon.ico')}}" />
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style3.css')}}" rel="stylesheet" />
    {{-- <link href="{{asset('css/style1.css')}}" rel="stylesheet" /> --}}
    {{-- <link href="{{asset('css/style2.css')}}" rel="stylesheet" /> --}}
    <link href="{{asset('css/toastify.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/toastify-js.js')}}"></script>




    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css')}}" rel="stylesheet" />

    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>


    <script src="{{asset('js/toastify-js.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>


    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
</head>

<body>

{{-- <div id="loader" class="LoadingOverlay d-none">
<div class="Line-Progress">
    <div class="indeterminate"></div>
</div>
</div> --}}

{{-- <nav class="navbar sticky-top shadow-sm navbar-expand-lg navbar-light py-2">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img class="img-fluid" src="{{asset('/images/logo.png')}}" alt="" width="96px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#header01" aria-controls="header01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="header01">
            <ul class="navbar-nav ms-auto mt-3 mt-lg-0 mb-3 mb-lg-0 me-4">
                <li class="nav-item me-4"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                <li class="nav-item me-4"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item me-4"><a class="nav-link" href="#">Company</a></li>
                <li class="nav-item me-4"><a class="nav-link" href="#">Services</a></li>
                <li class="nav-item me-4"><a class="nav-link" href="{{url('/experiences')}}">Experiences</a></li>
                <li class="nav-item me-4"><a class="nav-link" href="{{url('/projects')}}">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('/testimonials')}}">Testimonials</a></li>
            </ul>
            <div><a class="btn mt-3 bg-gradient-primary" href="{{url('/userLogin')}}">Start Sale</a></div>
        </div>
    </div>
</nav> --}}

<div>
    @yield('content')
</div>
<script>

</script>

<script src="{{asset('js/bootstrap.bundle.js')}}"></script>

</body>
</html>
