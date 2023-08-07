@extends('frontend/outer/app')
@section('content')

<main>
    <section class="py-5 fact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="racap-foundation">Member's Access </h5>
                    <h1 class="welcome-racap">Member's Login</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 mx-auto">
                    <form action="{{route('send.otp')}}" method="POST">

                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                                placeholder="name@business.com" value="{{ old('email') }}" required autocomplete="email"
                                autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Send OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection