@extends('backend.layout.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Mission</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('backend.home')}}">Home</a></li>
                <li class="breadcrumb-item active">Edit Mission Content</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mission Content details</h5>
                        <form class="row g-3" action="{{ route('mission.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="col-12">
                                <label for="product" class="form-label">Description</label>
                                <textarea name="description" id="editor1" cols="30"
                                    rows="10">{{$mission->description ?? ""}}</textarea>

                            </div>


                            @if ($mission)
                            <hr>
                            <label for="product" class="form-label">Uploaded Images</label>

                            <div class="col-12">
                                <img src="{{asset('public/uploads/mission/' . $mission->image)}}" alt="no img"
                                    width="100%">
                            </div>

                            <hr>

                            @endif

                            <div class="col-12">
                                <label for="product" class="form-label">Images</label>
                                <div class="productlist">
                                    <input type="file" class="form-control" max-size="2000" name="image">
                                </div>
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

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1');
</script>
@endsection