<header class="py-3 sticky-top bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3">
                <a class="navbar-brand" href="{{route('frontend.home')}}"><img
                        src="{{asset('public/frontend/raclogo1.png')}}" class="logo" /></a>
            </div>
            <div class="col-12 col-md-6">
                <nav class="navbar navbar-expand-lg" id="navbar-example2">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="btn btn-primary float-end d-block d-md-none" href="join-us.html"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop" role="button">Join Us</a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('frontend.home')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('frontend.home')}}/#about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('frontend.home')}}/#services">Interventions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('frontend.home')}}/#projects">Projects</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('frontend.home')}}/index.html#members">Members</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('frontend.home')}}/#contact">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-12 col-md-3 align-self-center d-none d-md-block">


                @if (auth()->check())

                <div class="btn-group float-end">
                    <a class="btn btn-primary float-end" href="myaccount.html">My Account</a>
                    <a class="btn btn-secondary float-end" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>

                @else

                <div class="btn-group float-end">
                    <a class="btn btn-primary float-end" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                        role="button">Join Us</a>
                    <!-- Button trigger modal -->
                    <a class="btn btn-secondary float-end" href="{{route('login')}}">Login</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</header>