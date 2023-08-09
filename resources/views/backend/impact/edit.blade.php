@extends('backend.layout.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Impact</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('backend.home')}}">Home</a></li>
                <li class="breadcrumb-item active">Impact</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Impact Content</h5>
                        <form class="row g-3" action="{{ route('impact.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- {{dd($impact->no)}} --}}
                            <div class="col-6">
                                <label for="product" class="form-label">Title</label>
                                <input type="text" class="form-control" name="name" placeholder="Title"
                                    value="{{$impact->name ?? ""}}">

                            </div>

                            <div class="col-6">
                                <label for="product" class="form-label">No</label>
                                <input type="number" class="form-control" name="no" placeholder="Count"
                                    value="{{$impact->no ?? ""}}">

                            </div>

                            <div class="col-6">
                                <label for="product" class="form-label">Title1</label>
                                <input type="text" class="form-control" name="name1" placeholder="Title"
                                    value="{{$impact->name1 ?? ""}}">

                            </div>

                            <div class="col-6">
                                <label for="product" class="form-label">No1</label>
                                <input type="number" class="form-control" name="no1" placeholder="Count"
                                    value="{{$impact->no1 ?? ""}}">

                            </div>

                            <div class="col-6">
                                <label for="product" class="form-label">Title2</label>
                                <input type="text" class="form-control" name="name2" placeholder="Title"
                                    value="{{$impact->name2 ?? ""}}">

                            </div>

                            <div class="col-6">
                                <label for="product" class="form-label">No2</label>
                                <input type="number" class="form-control" name="no2" placeholder="Count"
                                    value="{{$impact->no2 ?? ""}}">

                            </div>

                            <div class="col-6">
                                <label for="product" class="form-label">Title3</label>
                                <input type="text" class="form-control" name="name3" placeholder="Title"
                                    value="{{$impact->name3 ?? ""}}">

                            </div>

                            <div class="col-6">
                                <label for="product" class="form-label">No3</label>
                                <input type="number" class="form-control" name="no3" placeholder="Count"
                                    value="{{$impact->no3 ?? ""}}">

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