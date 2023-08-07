@extends('backend.layout.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <div class="d-flex justify-content-between">
            <div>
                <h1>All Interventions</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('backend.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">All Interventions</li>
                    </ol>
                </nav>

            </div>

            <div>
                <a href="{{route('intervention.create')}}">
                    <button class="btn btn-primary">Add Intervention</button>
                </a>

            </div>

        </div>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($interventions as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{!! $item->description !!}</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('intervention.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('intervention.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure ?')"
                                            type="submit" value="Delete">
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div><!-- End Left side columns -->
            <!-- Right side columns -->
            <!-- End Right side columns -->
        </div>
    </section>
</main><!-- End #main -->
@endsection