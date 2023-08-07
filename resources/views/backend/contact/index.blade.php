@extends('backend.layout.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <div class="d-flex justify-content-between">
            <div>
                <h1>All Contacts</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('backend.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">All Contacts</li>
                    </ol>
                </nav>

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
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Country Code</th>
                            <th>Phone</th>
                            <th>Message</th>
                            {{-- <th>Description</th> --}}
                            {{-- <th>Status</th> --}}
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($contacts as $item)
                        <tr>
                            <td>{{ $item->firstname }}</td>
                            <td>{{ $item->lastname }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->country_code }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->message }}</td>
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