@extends('frontend/outer/app')
@section('content')
<main>
    <section class="py-5 fact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="racap-foundation">Member's Access</h5>
                    <h1 class="welcome-racap">Member's Login OTP</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 mx-auto">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">OTP</label>
                            <input type="password" class="form-control" name="password" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="XXXXXX">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <form action="{{ route('resend.otp') }}" method="post">
                        @csrf
                        <input type="hidden" name="email" value="{{ $useremail }}">
                        <button type="submit" id="resendbtn" onclick="validate();" class="btn btn-secondary">Resend
                            OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    function validate() {
        document.getElementById('resendbtn').style.display = 'none';

        setInterval(function() {
            document.getElementById('resendbtn').style.display = 'block';

        }, 300000000);

        }
</script>
@endsection