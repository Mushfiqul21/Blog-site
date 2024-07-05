@extends('layouts.app')
@section('title', 'Add Category')
@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add Categories</h1>
            </div>
            <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Parent ID</label>
                                <input type="text" name="parent_id" class="form-control" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Image</label>
                                    <input type="file" name="image" class="from-control">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer pt-0">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
            </form>
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>

@endsection


@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
