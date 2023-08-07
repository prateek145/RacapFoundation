<footer class="pt-5 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <h5>About Us</h5>
                <img src="{{asset('public/frontend/raclogo1.png')}}" class="img-thumbnail" />
                <br>
                <p>
                    RACAP India is a dedicated non-profit organization committed to fostering socio-economic growth
                    by providing expert guidance on regulatory compliance and ethical business practices.
                </p>
            </div>
            <div class="col-12 col-md-4 text-center">
                <h5>Other Links</h5>
                <ul>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Disclaimer</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-4 text-center">
                <h5>Important Links</h5>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="{{route('frontend.home')}}/#contact">Contact Us</a></li>
                    <li><a href="{{route('frontend.home')}}/#about">About Us</a></li>
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Join as a Member</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-12">Copyright 2023. All rights reserved.</div>
        </div>
    </div>
</footer>