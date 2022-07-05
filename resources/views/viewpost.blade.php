@extends('layouts.master')

@section('content')
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center">
                {{-- <img class="img-fluid mb-4" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /> --}}
                <img class="img-fluid mb-4" src="{{ asset('uploads/posts/' . $posts->image) }}" alt="Image">
            </div>
            <div class="text-center my-5">
                <h1 class="fw-bolder">{{ $posts->title }}</h1>
                <p>Category: {{ $posts->category->name }}</p>
                <p>{{ $posts->created_at }}</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <p class="lead mb-0">{{ $posts->post_text }}</p>
            </div>
        </div>
    </div>
@endsection
