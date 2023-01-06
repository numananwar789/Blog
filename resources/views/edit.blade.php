@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div style="background: rgb(216, 123, 123)" class="rounded mb-2">
                        <ul style="padding-top: 5px; padding-bottom: 5px">
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header" style="font-weight: bold">
                        Update Post
                        <a href="/posts" class="float-end">
                            <button class="btn btn-secondary"> Go Back </button>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <label for="title" class="label">Title</label>
                            <input type="text" name="title" value="{{ $post->title }}" class="form-control mb-2">

                            <label for="description" class="label">Description</label>
                            <textarea name="description" cols="10" rows="5" class="form-control mb-2">{{ $post->description }}</textarea>

                            <label for="file" class="label">Select File</label>
                            <input type="file" name="image" class="form-control mb-3">

                            <button type="submit" class="btn btn-primary float-end">Update Post</button>
                        </form>
                        <img src='{{ asset('storage/' . $post->image) }}' alt="" width="100" height="100">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
