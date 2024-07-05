@extends('layouts.app')
@section('title', 'Blog')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/chocolat/dist/css/chocolat.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Blog View</h1>
                {{-- <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Blogs</a></div>
                    <div class="breadcrumb-item"><a href="#">Blog List</a></div>
                    <div class="breadcrumb-item">View</div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-6 col-md-9 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h1>
                                    {{ $blogData->title }}
                                </h1>
                            </div>
                            <div>
                                <h5>
                                    Category: {{ $blogData->category->name }}
                                </h5>
                            </div>
                            <div class="carousel-inner mt-4">
                                <div class="carousel-item active">
                                    @if ($blogData->thumbnail)
                                        <img src="{{ asset($blogData->thumbnail) }}" width="500px">
                                    @endif
                                </div>
                            </div>
                            <div class="mt-3">
                                <p>
                                    {!! $blogData->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <h4>Images</h4>
                            </div>
                            <div class="gallery gallery-fw" data-item-height="150">
                                @foreach ($blogData->blogImage as $blogimage)
                                    <div class="gallery-item gallery-md"
                                        data-image="{{ asset( $blogimage->image) }}" data-title="Image"></div>
                                @endforeach
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
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <!-- Page Specific JS File -->
@endpush