@extends('layout.master')
@section('title')
    Facebook - Post
@endsection
@section('content')
    <section class="container pb-5" style="margin-top: 90px;">
        <div style="width: 50%; margin: auto; background-color: white;" class="py-3 rounded">
            <div>
                <h2 class="text-center my-1" style="font-weight: bold;font-size: 22px;">{{ $blog->user->full_name }}'s Post
                </h2>
            </div>
            <hr class="m-1">
            <div class="post rounded my-1">
                <div class="d-flex align-items-center">
                    <div class="image">
                        <img class="rounded-circle" style="width: 40px;" src="{{ asset($blog->user->image) }}"
                            alt="">
                    </div>
                    <div style="flex: 1;">
                        <h5 class="mx-3 my-0" style="font-weight: 200">{{ $blog->user->full_name }}</h5>
                        <p class="mx-3 my-0 p-0 text-secondary" style="font-size: 14px;">{{ $blog->created_at_formatted }}
                        </p>
                    </div>
                    @if (Auth::user()->id == $blog->user->id)
                        <div class="d-flex">
                            <a href="{{ url('/blog/edit', [$blog->id]) }}" style="font-size: 20px; margin-right: 10px;"><i
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
                <div class="mt-1 text-secondary">
                    <span><span id="blog_{{ $blog->id }}">{{ $blog->likes_count }}</span> <i
                            class="mx-1 fa-solid fa-thumbs-up"></i></span>
                    <span class="mx-1">{{ $blog->comments_count }}<i class="mx-1 fa-solid fa-comments"></i></span>
                </div>
                <hr class="mb-1">
                <div class="react d-flex justify-content-around align-items-center w-100">
                    <a class="btn text-dark" onClick="routeToLikeBlog({{ $blog->id }})">Like</a>
                    <a class="btn text-dark" onClick="routeToComment({{ $blog->id }})">Comment</a>
                </div>
                <hr class="m-2">
                <div id="comment_{{$blog->id}}">
                @foreach ($comments as $comment)
                    <div class="comment mb-2">
                        <div class="d-flex align-items-start">
                            <div class="image">
                                <img class="rounded-circle" style="width: 40px;" src="{{ asset($comment->user->image) }}"
                                    alt="">
                            </div>
                            <div class="mx-3 w-100">
                                <div class="p-1" style="background-color: #F2F4F7; border-radius: 15px;">
                                    <h6 class="mx-3 my-0" style="font-weight: 600">{{ $comment->user->full_name }}</h6>
                                    <p class="mx-3 my-0 py-1" style="font-size: 18px; font-weight: 200;">
                                        {{ $comment->content }}</p>
                                    <p class="mx-3 my-0 py-1 text-secondary" style="font-size: 14px;">
                                        {{ $comment->created_at_formatted }}</p>
                                </div>
                                <a class="mx-3 text-dark" href="{{ url('/comment_like', [$comment->id]) }}">Like</a>
                                <button style="border: none; background-color: transparent; cursor: pointer;"
                                    class="mx-1 text-dark" onClick="showReply{{ $comment->id }}()">Reply</button>
                                <span class="ml-4"><span
                                        id="comment_{{ $comment->id }}">{{ $comment->likes_count }}</span> <i
                                        class="mx-1 fa-solid fa-thumbs-up"></i></span>
                                @foreach ($replies as $reply)
                                    @if ($reply->comment_id == $comment->id)
                                        <div class="replies mb-2">
                                            <div class="d-flex align-items-start">
                                                <div class="image">
                                                    <img class="rounded-circle" style="width: 40px;"
                                                        src="{{ asset($reply->user->image) }}" alt="">
                                                </div>
                                                <div class="mx-3 w-100">
                                                    <div class="p-1"
                                                        style="background-color: #F2F4F7; border-radius: 15px;">
                                                        <h6 class="mx-3 my-0" style="font-weight: 600">
                                                            {{ $reply->user->full_name }}</h6>
                                                        <p class="mx-3 my-0 py-1"
                                                            style="font-size: 18px; font-weight: 200;">
                                                            {{ $reply->content }}</p>
                                                        <p class="mx-3 my-0 py-1 text-secondary" style="font-size: 14px;">
                                                            {{ $reply->created_at_formatted }}</p>
                                                    </div>
                                                    <button class="mx-3 text-dark"
                                                        onClick="routeToLikeReply({{ $reply->id }})">Like</button>
                                                    <span class="ml-4">
                                                        <span
                                                            id="reply_{{ $reply->id }}">{{ $reply->likes_count }}</span>
                                                        <i class="mx-1 fa-solid fa-thumbs-up"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="w-100" id="reply{{ $comment->id }}"
                                    style="display: none; transition: 0.3s all;">
                                    <div class="add-comment p-2" style="background-color: #F2F4F7; border-radius: 15px;">
                                        <div class="d-flex align-items-start">
                                            <div class="image">
                                                <img class="rounded-circle" style="width: 40px;"
                                                    src="{{ asset(Auth::user()->image) }}" alt="">
                                            </div>
                                            <form method="post" id="reply_add_{{ $comment->id }}" class="w-100">
                                                <input type="hidden" name="_token" id="_token"
                                                    value="{{ csrf_token() }}">
                                                {{-- @csrf --}}
                                                <input type="hidden" value="{{ $blog->id }}" name="blog_id">
                                                <div>
                                                    <textarea required name="content" id="content" placeholder="Reply as {{ Auth::user()->full_name }}"></textarea>
                                                </div>
                                                <button type="button" onClick="addReplay_{{$comment->id}}({{$comment->id}})"
                                                    style="float: right ;border:none; cursor: pointer;">
                                                    <i class="text-secondary fa-solid fa-paper-plane"></i> </button>
                                            </form>
                                            <script>
                                                function addReplay_{{$comment->id}}(id) {
                                                    event.preventDefault();
                                                    $.ajax({
                                                        type: "post",
                                                        url: '/reply/add1/'+id,
                                                        data: $("#reply_add_{{ $comment->id }}").serialize(),
                                                        success: function(data) {
                                                            $("#comment_"+id).html(data);
                                                        },
                                                        error: function() {}
                                                    });
                                                };
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function showReply{{ $comment->id }}() {
                                        document.getElementById("reply{{ $comment->id }}").style.display = "block"
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="add-comment p-2" style="background-color: #F2F4F7; border-radius: 15px;">
                    <div class="d-flex align-items-start">
                        <div class="image">
                            <img class="rounded-circle" style="width: 40px;" src="{{ asset(Auth::user()->image) }}"
                                alt="">
                        </div>
                        <form method="post" action="{{ url('/comment/add', [$blog->id]) }}" class="w-100">
                            @csrf
                            <div>
                                <textarea required name="content" id="content" placeholder="Comment as {{ Auth::user()->full_name }}"></textarea>
                            </div>
                            <button type="submit" style="float: right ;border:none; cursor: pointer;"><i
                                    class="text-secondary fa-solid fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection
