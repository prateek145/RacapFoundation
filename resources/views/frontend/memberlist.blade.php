@extends('frontend/outer/app')
@section('content')

<main>
    <section class="py-5 fact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="racap-foundation">Our Members </h5>
                    <h1 class="welcome-racap">Join <span class="orange-text">1000+</span> Members </h1>
                    <h3 class="racap-foundation organise"> Enable your business to move ahead </h3>

                </div>
            </div>
        </div>
    </section>


    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">



                    <table id="example" class="table table-striped display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Business</th>
                                <th>Industry</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Website</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($members as $item)
                            <tr>
                                <td>
                                    @if (!is_null($item->image))
                                    <img src="{{asset('public/uploads/users/' . $item->image)}}" height="30px"
                                        width="30px" alt="">
                                    @else
                                    <img src="" height="30px" width="30px" alt="no image">
                                    @endif
                                </td>
                                <td>{{$item->bname}}</td>
                                <td>{{$item->sector}}</td>
                                <td>{{$item->city}}</td>
                                <td>{{$item->state}}</td>
                                <td>{{$item->website}}</td>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>


                </div>
            </div>
        </div>
    </section>

</main>

@endsection