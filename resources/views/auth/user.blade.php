@extends('layout.master')
@section('title')
    Facebook - Profile
@endsection
@section('content')
    <div class="container profile" style="margin-top: 65px; background-color: white;">
        <div>
            <div class="header">
                <div class="image-cover">
                    <img src="{{ asset($user->cover) }}" alt="">
                </div>
                <div class="image-profile">
                    <img src="{{ asset($user->image) }}" alt="">
                </div>
            </div>
            <div class="name">
                <h1>{{ $user->full_name }}</h1>
            </div>
            <div class="edit">
                <a class="btn" href="{{ url('profile/edit') }}"><i
                        class="mr-2 text-secondary fa-regular fa-pen-to-square"></i>Edit Profile</a>
            </div>
        </div>
        <div class="content d-flex">
            <div class="main">
                <div class="add-post rounded d-flex gap-5">
                    <div class="image">
                        <img style="width: 50px;" src="{{ asset($user->image) }}" alt="">
                    </div>
                    <div class="button">
                        <a href="{{ url('blog/add') }}" class="btn">What's on your mind, {{ $user->fname }}?</a>
                    </div>
                </div>
                @foreach ($blogs as $blog)
                    <div class="post rounded my-4">
                        <div class="d-flex align-items-center">
                            <div class="image">
                                <img class="rounded-circle" style="width: 40px;" src="{{ asset($blog->user->image) }}"
                                    alt="">
                            </div>
                            <div style="flex: 1;">
                                <h5 class="mx-3 my-0" style="font-weight: 200">{{ $blog->user->full_name }}</h5>
                                <p class="mx-3 my-0 p-0 text-secondary" style="font-size: 14px;">
                                    {{ $blog->created_at_formatted }}</p>
                            </div>
                            @if (Auth::user()->id == $blog->user->id)
                                <div class="d-flex">
                                    <a href="{{ url('/blog/edit', [$blog->id]) }}"
                                        style="font-size: 20px; margin-right: 10px;"><i
                                            class="text-secondary fa-regular fa-pen-to-square"></i></a>
                                    <a href="{{ url('/blog/delete', [$blog->id]) }}" style="font-size: 20px;"><i
                                            class="text-secondary fa-solid fa-trash"></i></a>
                                </div>
                            @endif
                        </div>
                        <div>
                            <p class="py-3">{{ $blog->content }}</p>
                        </div>
                        <div class="image">
                            <img class="w-100" src="{{ asset($blog->image) }}" alt="">
                        </div>
                        <div class="my-1 text-secondary">
                            <span>{{ $blog->likes_count }} <i class="mx-1 fa-solid fa-thumbs-up"></i></span>
                            <span class="mx-1">{{ $blog->comments_count }}<i
                                    class="mx-1 fa-solid fa-comments"></i></span>
                        </div>
                        <hr class="mb-1">
                        <div class="react d-flex justify-content-around align-items-center w-100">
                            <a class="btn text-dark" href="{{ url('/blog_like', [$blog->id]) }}">Like</a>
                            <a class="btn text-dark" href="{{ url('/blog', [$blog->id]) }}">Comment</a>
                        </div>
                        <hr class="m-1">
                    </div>
                @endforeach
            </div>
            <div class="section">
                <h3><strong>About</strong></h3>
                <p>@if($user->gender=='female')<i class="mr-2 fa-solid fa-person-dress"></i>
                    @else<i class="mr-2 fa-solid fa-person"></i>
                    @endif {{ $user->gender }}</p>

                <p><i class="mr-2 fa-regular fa-calendar-days"></i>Born in <strong> {{ $user->birthdate }} </strong></p>
                <p><i class="mr-2 fa-solid fa-house"></i>Lives in <strong>{{ $user->address }}</strong></p>
            
                <p><i class="mr-2 fa-solid fa-phone"></i> {{ $user->phone }}</p>

                <p><i class="mr-2 fa-solid fa-envelope"></i> {{ $user->email }}</p>
            </div>
        </div>
    </div>
@endsection
