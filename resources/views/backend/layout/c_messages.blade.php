
    @if (Session::has('success'))
<main class="main" id="main">
    <div class="alert alert-success alert-dismissible fade in show col-md-12">
        <strong>Success!</strong> {{ session('success') }}
        {{-- <button type="button" class="close" data-dismiss="alert">&times;</button> --}}
    </div>
</main>
    @endif

    @if (Session::has('error'))
    <main class="main" id="main">
    <div class="alert alert-danger alert-dismissible fade in show col-md-12">
        <strong>Error!</strong> {{ session('error') }}
        {{-- <button type="button" class="close" data-dismiss="alert">&times;</button> --}}
    </div>
    </main>
    @endif

