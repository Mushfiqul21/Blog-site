@extends('layouts.app')
@section('title', 'Category List')
@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush
@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Category List</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-action">
                            <a href="#"
                                class="btn btn-primary">View All</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table-striped mb-0 table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name</th>
                                        <th>Parent Id</th>
                                        <th>Category Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoryData as $key => $data)
                                    <tr>
                                        <td scope="row">{{(int)$key+1}}</td>

                                        <td>{{ $data->name }}</td>

                                        <td>{{ $data->parent_id }}</td>

                                        <td><img src="{{ asset('category_images/' . $data->image) }}" width="50px"
                                            height="50px"></td>

                                        <td>
                                         <a href="{{ route('category.edit', $data->id) }}" class="btn btn-success btn-action mr-1"
                                            data-toggle="tooltip">Edit</a>
                                         <form method="POST" action="{{ route('category.destroy', $data->id) }}">
                                            @csrf
                                            @method('delete')
                                           
                                                <button type="submit" class="btn btn-danger btn-sm btn-action"
                                                data-toggle="tooltip">Delete</button>
                                           
                                        </form>
                                         {{-- <a href="{{ route('blog.destroy', $data->id) }}" class="btn btn-danger">Delete</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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