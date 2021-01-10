<link href="{{ asset('css/admin/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{ asset('css/jubel/admin_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/jubel/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('fa/css/all.css') }}">
<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('fa/js/fontawesome.min.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/admin_js.js')}}"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="row">
    <!-- uncomment code for absolute positioning tweek see top comment in css -->
    <!-- <div class="absolute-wrapper"> </div> -->
    <!-- Menu -->
    <div class="side-menu">

    <nav class="navbar navbar-default" role="navigation" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <div class="brand-wrapper">
            <!-- Hamburger -->
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Brand -->
            <div class="brand-name-wrapper">
                <a class="navbar-brand" href="#">
                  POIL's
                </a>
            </div>
        </div>

    </div>

    <!-- Main Menu -->
    <div class="side-menu-container">
        <ul class="nav navbar-nav">

            <li><a href="{{ URL('/admin')}}"><span class="fa fa-list"></span> Pesanan</a></li>
            <li><a href="{{ route('produk.index')}}"><i class="fas fa-question-circle"></i>Produk</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"></li>

        </ul>
    </div>
</nav>
</div>

    <!-- Main Content -->
    <div class="container">
        <div class="side-body">
          @yield('content')
        </div>
    </div>
</div>
