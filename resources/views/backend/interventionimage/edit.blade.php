@extends('backend.layout.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Intervention Images</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('backend.home')}}">Home</a></li>
                <li class="breadcrumb-item active">Edit Intervention Images</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Intervention Images details</h5>
                        <form class="row g-3" action="{{ route('intervention-images.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            @if ($images)
                            <hr>
                            <label for="product" class="form-label">Uploaded Images</label>
                            @foreach ($images as $item)
                            <div class="col-6">
                                <a href="{{route('intervention-images.show', $item)}}">
                                    <input type="button" class="btn btn-danger btn-sm" value="Delete">
                                </a>

                                <img src="{{asset('public/uploads/interventionimage/' . $item)}}" alt="no img"
                                    width="100%">
                            </div>

                            @endforeach
                            <hr>

                            @endif
                            <div class="col-12">
                                <label for="product" class="form-label">Images</label>
                                <div class="productlist">
                                    <input type="file" class="form-control" max-size="2000" name="image[]">
                                </div>
                                <input type="button" class="btn btn-primary mb-2" onclick="addvaluelist2()"
                                    value="add more">
                                <input type="button" class="btn btn-danger mb-2" onclick="removevaluelist2()"
                                    value="remove">
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- End Left side columns -->
            <!-- Right side columns -->

            <!-- End Right side columns -->
        </div>
    </section>
</main><!-- End #main -->


<script>
    // function addvaluelist2() {
    //         var listlength = document.getElementsByClassName('productlist');
    //         var valuelistvalue = document.getElementsByClassName('productlist')[listlength.length - 1];
    //         var count = document.getElementsByName('images[]').length;
    //         var input = document.createElement('input');
    //         input.name = 'image[]';
    //         input.className = 'form-control mt-2';
    //         input.type = 'file';
    //         input.setAttribute("max-size", "2000");

    //         valuelistvalue.appendChild(input);

    // }

    // function removevaluelist2() {
    //         var valuelistinput = document.getElementsByName('images[]');
    //         console.log(valuelistinput);
    //         if (valuelistinput.length > 1) {
    //             valuelistinput[valuelistinput.length - 1].remove();

    //         }
    // }
</script>
@endsection