@extends('layouts.app')
@section('title', 'Blog List')
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
            <h1>Blog List</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-action">
                            <a href="{{ route('blog.create') }}"
                                class="btn btn-primary">Add New Blog</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table-striped mb-0 table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Thumbnail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogData as $key => $data)
                                    <tr>
                                        <td scope="row">{{(int)$key+1}}</td>

                                        <td>{{ $data->title }}</td>

                                        <td>{{ $data->category->name }}</td>

                                        <td> {!! implode(' ', array_slice(explode(' ', $data->description), 0, 5)) !!}... </td>

                                        <td><img src="{{ asset($data->thumbnail) }}" width="50px"
                                            height="50px"></td>

                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('blog.show', $data->id) }}" class="btn btn-info btn-action mr-1"
                                                   data-toggle="tooltip">View</a>
                                                <a href="{{ route('blog.edit', $data->id) }}" class="btn btn-success btn-action mr-1"
                                                   data-toggle="tooltip">Edit</a>
                                                <form method="POST" action="{{ route('blog.destroy', $data->id) }}">
                                                    @csrf
                                                    @method('delete')

                                                    <button type="submit" class="btn btn-danger btn-sm btn-action"
                                                            data-toggle="tooltip">Delete</button>

                                                </form>
                                            </div>
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
