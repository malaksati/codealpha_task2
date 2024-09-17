@extends('layout.master')
@section('title')
    Home
@endsection
@section('content')
    <div style="margin-top: 90px;" class="container pb-5">
        <div class="home" style="width: 60%; margin: auto;">
            <div class="add-post rounded-5 d-flex gap-5" >
                <div class="image rounded-circle">
                    <img class="rounded-circle" style="width: 50px;" src="{{ asset(Auth::user()->image) }}" alt="">
                </div>
                <div class="w-100">
                    <a href="{{ url('blog/add') }}" class="btn">What's on your mind, {{Auth::user()->fname}}?</a>
                </div>
            </div>
            @foreach ($blogs as $blog)
            <div class="post rounded my-4">
                <div class="d-flex align-items-center">
                    <div class="image">
                        <img class="rounded-circle" style="width: 40px;" src="{{ asset($blog->user->image) }}" alt="">
                    </div>
                    <div style="flex: 1;">
                        <h5 class="mx-3 my-0" style="font-weight: 200">{{ $blog->user->full_name }}</h5>
                        <p class="mx-3 my-0 p-0 text-secondary" style="font-size: 14px;">{{ $blog->created_at_formatted }}</p>
                    </div>
                    @if(Auth::user()->id == $blog->user->id)
                    <div class="d-flex">
                        <a href="{{ url('/blog/edit', [$blog->id]) }}" style="font-size: 20px; margin-right: 10px;"><i class="text-secondary fa-regular fa-pen-to-square"></i></a>
                        <a href="{{ url('/blog/delete', [$blog->id]) }}" style="font-size: 20px;"><i class="text-secondary fa-solid fa-trash"></i></a>
                    </div>
                    @endif
                </div>
                <div>                
                    <p style="font-size: 20px;" class="py-3">{{ $blog->content }}</p>
                </div>
                <div class="image">
                    <img class="w-100" src="{{ asset($blog->image) }}" alt="">
                </div>
                <div class="my-1 text-secondary">
                    <span><span id="blog_{{$blog->id}}">{{ $blog->likes_count }}</span> <i class="mx-1 fa-solid fa-thumbs-up"></i></span>
                    <span class="mx-1">{{ $blog->comments_count }}<i class="mx-1 fa-solid fa-comments"></i></span>
                </div>
                <hr class="mb-1">
                <div class="react d-flex justify-content-around align-items-center w-100">
                    <a class="btn text-dark" onClick="routeToLikeBlog({{$blog->id}})" >Like</a>
                    <a class="btn text-dark" onClick="routeToComment({{$blog->id}})">Comment</a>
                </div>
                <hr class="m-2">
                <div id="comment_{{$blog->id}}"></div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
