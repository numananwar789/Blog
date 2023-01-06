@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ $post->title }}</h1>
                <hr>
            </div>
            <div class="col-md-8 d-flex justify-content-between">
                <span>
                    By: <strong> {{ $post->user->name }} </strong>
                </span>
                <span>
                    Created on <strong> {{ date('jS M Y', strtotime($post->updated_at)) }}
                    </strong>
                </span>
            </div>
            <br>
            <br>
            <div class="col-md-8">
                <p> {{ $post->description }} </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <img src='{{ asset('storage/' . $post->image) }}' alt="{{ $post->image }}" width="500" height="300">
            </div>
        </div>
    </div>
@endsection
