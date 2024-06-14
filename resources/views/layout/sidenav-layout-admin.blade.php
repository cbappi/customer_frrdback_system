<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title></title>

    <link rel="icon" type="image/x-icon" href="{{asset('/favicon.ico')}}" />
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/toastify.min.css')}}" rel="stylesheet" />


    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css')}}" rel="stylesheet" />

    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>


    <script src="{{asset('js/toastify-js.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>




</head>

<body>

<div id="loader" class="LoadingOverlay d-none">
    <div class="Line-Progress">
        <div class="indeterminate"></div>
    </div>
</div>

<nav class="navbar fixed-top px-0 shadow-sm bg-white">
    <div class="container-fluid">


        <a class="navbar-brand" href="#">
            <span class="icon-nav m-0 h5" onclick="MenuBarClickHandler()">
                <img class="nav-logo-sm mx-2"  src="{{asset('images/menu.svg')}}" alt="logo"/>
            </span>
            <img class="nav-logo  mx-2"  src="{{asset('images/customer review.jpg')}}" alt="logo" style="width: 250px; height: 70px; />
        </a>

        <div class="float-right h-auto d-flex">
            <div class="user-dropdown">
                <img class="icon-nav-img" src="{{asset('images/user.webp')}}" alt=""/>
                <div class="user-dropdown-content ">
                    <div class="mt-4 text-center">
                        <img class="icon-nav-img" src="{{asset('images/user.webp')}}" alt=""/>
                        <h6>User Name</h6>
                        <hr class="user-dropdown-divider  p-0"/>
                    </div>
                    <a href="{{url('/userProfile')}}" class="side-bar-item">
                        <span class="side-bar-item-caption">Profile</span>
                    </a>
                    <a href="{{url("/logout")}}" class="side-bar-item">
                        <span class="side-bar-item-caption">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>


<div id="sideNavRef" class="side-nav-open">

    <ul class="menu-inner py-1">

            <a href="{{url("/dashboard-admin")}}" class="side-bar-item menu-link menu-toggle">
                <i class="bi bi-graph-up"></i>
                <span class="side-bar-item-caption">Dashboard Admin</span>
            </a>




            <a href="{{url("/frontcategoryPage")}}" class="side-bar-item">
                <i class="bi bi-file-earmark-bar-graph"></i>
                <span class="side-bar-item-caption">Front Category</span>
            </a>



            <a href="{{url("/booknameadminPage")}}" class="side-bar-item">
                <i class="bi bi-list-nested"></i>
                <span class="side-bar-item-caption">Book Name</span>
            </a>

            <a href="{{url("/bookcategoryadminPage")}}" class="side-bar-item">
                <i class="bi bi-list-nested"></i>
                <span class="side-bar-item-caption">Book Category</span>
            </a>

            <a href="{{url("/bookreviewPage")}}" class="side-bar-item">
                <i class="bi bi-list-nested"></i>
                <span class="side-bar-item-caption">Book Review</span>
            </a>
          

            <a href="{{url("/hotelsubcategoryadminPage")}}" class="side-bar-item">
                <i class="bi bi-list-nested"></i>
                <span class="side-bar-item-caption">Hotel Sub Category</span>
            </a>






            <a href="{{url("/resturentsubcategoryadminPage")}}" class="side-bar-item">
                <i class="bi bi-receipt"></i>
                <span class="side-bar-item-caption">Resturent Sub Category</span>
            </a>


            <a href="{{url('/resturentreviewPage')}}" class="side-bar-item">
                <i class="bi bi-file-earmark-bar-graph"></i>
                <span class="side-bar-item-caption">Resturent Review</span>
            </a>

            <a href="{{url('/hotelreviewPage')}}" class="side-bar-item">
                <i class="bi bi-file-earmark-bar-graph"></i>
                <span class="side-bar-item-caption">Hotel Review</span>
            </a>
    </ul>


</div>


<div id="contentRef" class="content">
    @yield('content')
</div>



<script>
    function MenuBarClickHandler() {
        let sideNav = document.getElementById('sideNavRef');
        let content = document.getElementById('contentRef');
        if (sideNav.classList.contains("side-nav-open")) {
            sideNav.classList.add("side-nav-close");
            sideNav.classList.remove("side-nav-open");
            content.classList.add("content-expand");
            content.classList.remove("content");
        } else {
            sideNav.classList.remove("side-nav-close");
            sideNav.classList.add("side-nav-open");
            content.classList.remove("content-expand");
            content.classList.add("content");
        }
    }
</script>

</body>
</html>
