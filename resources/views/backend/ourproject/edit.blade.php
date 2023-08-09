@extends('backend.layout.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Add Projects</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('backend.home')}}">Home</a></li>
                <li class="breadcrumb-item active">Add Projects</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Projects details</h5>
                        {{-- {{dd($project)}} --}}
                        <form class="row g-3" action="{{ route('ourproject.update', $project->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf


                            <div class="col-6">
                                <label for="refno" class="form-label"> Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{$project->name ?? ""}}" required>
                            </div>


                            <div class="col-12">
                                <label for="refno" class="form-label">Url</label>
                                <input type="text" class="form-control" name="link" placeholder="Link/Url"
                                    value="{{$project->link ?? ""}}">
                            </div>


                            <div class="col-md-12">
                                <label for="description">Description</label><br>
                                <textarea name="description" id="editor1" cols="30"
                                    rows="10">{{$project->description ?? ""}}</textarea>
                            </div>

                            @if ($project->logo)

                            <div class="col-12">
                                <label for="product" class="form-label">Uploaded Logo</label>
                                <div class="col-12">
                                    <img src="{{asset('public/uploads/projects/' . $project->logo)}}" alt="no img"
                                        width="100%">
                                </div>

                            </div>
                            @endif
                            <div class="col-md-12">
                                <label for="product" class="form-label">Image</label>
                                <div class="productlist">
                                    <input type="file" class="form-control" max-size="2000" name="img" required>
                                </div>
                            </div>


                            {{-- <input type="hidden" name="user_id" value="{{ auth()->id() }}"> --}}

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