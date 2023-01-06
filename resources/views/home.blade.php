@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (session()->has('message'))
                <div class="col-md-8 mb-3 pt-2 pb-2 bg-success rounded">
                    <span style="color: white">
                        {{ session()->get('message') }}
                    </span>
                </div>
            @endif

            <div class="d-flex justify-content-between col-md-8 mb-3">
                <h1 style="font-weight: bold">Blog Posts</h1>
                @if (Auth::check())
                    <a href="{{ route('posts.create') }}">
                        <button class="btn btn-primary float-end"> Create Post </button>
                    </a>
                @endif
            </div>

            <div class="col-md-8">
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <div class="card mb-4">
                            <a href="posts/{{ $post->slug }}">
                                <img class="card-img-top" src='{{ asset('storage/' . $post->image) }}' alt="Card image cap">
                            </a>
                            <div class="card-header" style="font-weight: bold">{{ $post->title }}</div>
                            <div class="card-body">
                                {{ $post->description }}
                                <div class="pl-1 pt-1">
                                    <a href="posts/{{ $post->slug }}" style="text-decoration: none">Read More</a>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <span>
                                        By: <strong> {{ $post->user->name }} </strong>
                                    </span>
                                    <span>
                                        Created on: <strong> {{ date('jS M Y', strtotime($post->updated_at)) }}
                                        </strong>
                                    </span>
                                    @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                                        <a href="/posts/{{ $post->slug }}/edit">Edit</a>

                                        <form action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" style="color: red;" class="btn">Delete</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card mb-4">
                        <div class="card-body">
                            No post have been added yet!
                        </div>
                    </div>
                @endif
            </div>
            <br>
            <br>
        </div>
    </div>
@endsection
