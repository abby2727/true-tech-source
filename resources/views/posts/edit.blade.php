@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Update Post') }}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif

                        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Input title" value="{{ $post->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Image</label>
                                <input type="file" name="image" accept="" class="form-control">
                                <img src="{{ asset('uploads/posts/' . $post->image) }}" width="70px" height="70px"
                                    alt="Image">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="post_text" cols="30" rows="5" id="" class="form-control"
                                    placeholder="Input description">{{ $post->post_text }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($categories as $category_item)
                                        <option value="{{ $category_item->id }}"
                                            {{ $post->category_id == $category_item->id ? 'selected' : '' }}>
                                            {{ $category_item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Update" class="btn btn-primary">
                                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
