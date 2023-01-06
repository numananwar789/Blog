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
                        Create Post
                        <a href="/posts" class="float-end">
                            <button class="btn btn-secondary"> Go Back </button>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="title" class="label">Enter Title</label>
                            <input type="text" name="title" placeholder="Title..." class="form-control mb-2">
                            <label for="description" class="label">Enter Description</label>
                            <textarea name="description" cols="10" rows="5" placeholder="Description..." class="form-control mb-2"></textarea>
                            <label for="file" class="label">Select File</label>
                            <input type="file" name="image" class="form-control mb-3">
                            <button type="submit" class="btn btn-primary float-end">Submit Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
