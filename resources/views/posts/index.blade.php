@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Post') }}
                        <a href="{{ route('posts.create') }}" class="btn btn-info float-end">Add New Post</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session('status_delete'))
                            <div class="alert alert-danger">{{ session('status_delete') }}</div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->post_text }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/posts/' . $post->image) }}" width="70px"
                                                height="70px" alt="Image">
                                        </td>
                                        <td>
                                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a>

                                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')">
                                            </form>
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
@endsection
