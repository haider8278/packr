<!-- Section Preloader -->
<div id="section-preloader">
    <div class="boxes">
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <p>LOADING . . .</p>
</div>
<!-- /.Section Preloader -->
<!-- Section Navbar -->
<nav class="navbar-1 navbar navbar-expand-lg @if(request()->route()->getName() != 'frontend.index') navigationscheme @endif">
    <div class="container navbar-container">
        <a class="navbar-brand" href="{{route('frontend.index')}}"><img src="{{asset("public/assets/images/logo.png")}}" alt="ShopEarn" style="max-height: 50px;"></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('frontend.requests.index')}}" class="nav-link">Requests</a>
                </li>
                <li class="nav-item dropdown-submenu dropdown">
                    <a class="dropdown-item dropdown-toggle nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        I want to
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('frontend.requests.create')}}/?type=offer" class="dropdown-item">Offer Space</a></li>
                        <li><a href="{{route('frontend.requests.create')}}/?type=request" class="dropdown-item">Require Space</a></li>
                        <li><a href="{{route('frontend.requests.create')}}/?type=shipping" class="dropdown-item">Offer Shipping</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{url('/blog')}}" class="nav-link">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/faqs')}}" class="nav-link">FAQ's</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/contact')}}" class="nav-link">Contact</a>
                </li>
                @if (auth()->check())
                <li class="nav-item dropdown-submenu dropdown">
                    <a class="dropdown-item dropdown-toggle nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('frontend.user.account')}}" class="dropdown-item">Profile</a></li>
                        <li><a href="{{route('frontend.notifications.index')}}" class="dropdown-item">Notifications</a></li>
                        <li><a href="{{route('frontend.chats.index')}}" class="dropdown-item">Messages</a></li>
                        <li><a href="{{route('frontend.requests.index')}}/?type=myoffers" class="dropdown-item">Offers</a></li>
                        <li><a href="{{route('frontend.requests.index')}}/?type=myrequests" class="dropdown-item">Requests</a></li>
                        <li><a href="{{route('frontend.myorders')}}" class="dropdown-item">Orders</a></li>
                        <li><a href="{{url('logout')}}" class="dropdown-item">Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
        @if (!auth()->check())
        <a href="{{url('/login')}}" class="btn-1 shadow1 style3 bgscheme">Login</a>
        @endif
        <button type="button" id="sidebarCollapse" class="navbar-toggler active" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
    <!-- container -->
</nav>
<!-- /.Section Navbar -->