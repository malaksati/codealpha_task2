@foreach ($comments as $comment)
    <div class="comment mb-2">
        <div class="d-flex align-items-start">
            <div class="image">
                <img class="rounded-circle" style="width: 40px;" src="{{ asset($comment->user->image) }}" alt="">
            </div>
            <div class="mx-3 w-100">
                <div class="p-1" style="background-color: #F2F4F7; border-radius: 15px;">
                    <h6 class="mx-3 my-0" style="font-weight: 600">{{ $comment->user->full_name }}</h6>
                    <p class="mx-3 my-0 py-1" style="font-size: 18px; font-weight: 200;">
                        {{ $comment->content }}</p>
                    <p class="mx-3 my-0 py-1 text-secondary" style="font-size: 14px;">
                        {{ $comment->created_at_formatted }}</p>
                </div>
                <button class="mx-3 text-dark" onClick="routeToLikeComment({{ $comment->id }})">Like</button>
                <button style="border: none; background-color: transparent; cursor: pointer;" class="mx-1 text-dark"
                    onClick="showReply{{ $comment->id }}()">Reply</button>
                <span class="ml-4"><span id="comment_{{ $comment->id }}">{{ $comment->likes_count }}</span> <i
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
                                    <div class="p-1" style="background-color: #F2F4F7; border-radius: 15px;">
                                        <h6 class="mx-3 my-0" style="font-weight: 600">
                                            {{ $reply->user->full_name }}</h6>
                                        <p class="mx-3 my-0 py-1" style="font-size: 18px; font-weight: 200;">
                                            {{ $reply->content }}</p>
                                        <p class="mx-3 my-0 py-1 text-secondary" style="font-size: 14px;">
                                            {{ $reply->created_at_formatted }}</p>
                                    </div>
                                    <button class="mx-3 text-dark"
                                        onClick="routeToLikeReply({{ $reply->id }})">Like</button>
                                    <span class="ml-4"><span
                                            id="reply_{{ $reply->id }}">{{ $reply->likes_count }}</span> <i
                                            class="mx-1 fa-solid fa-thumbs-up"></i></span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="w-100" id="reply{{ $comment->id }}" style="display: none; transition: 0.3s all;">
                    <div class="add-comment p-2" style="background-color: #F2F4F7; border-radius: 15px;">
                        <div class="d-flex align-items-start">
                            <div class="image">
                                <img class="rounded-circle" style="width: 40px;" src="{{ asset(Auth::user()->image) }}"
                                    alt="">
                            </div>
                            <form method="post" action="{{ url('/reply/add', [$comment->id]) }}" class="w-100">
                                @csrf
                                <input type="hidden" value="{{ $comment->blog->id }}" name="blog_id">
                                <div>
                                    <textarea required name="content" id="content" placeholder="Reply as {{ Auth::user()->full_name }}"></textarea>
                                </div>
                                <button type="submit" style="float: right ;border:none; cursor: pointer;"><i
                                        class="text-secondary fa-solid fa-paper-plane"></i></button>
                            </form>
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
            <img class="rounded-circle" style="width: 40px;" src="{{ asset(Auth::user()->image) }}" alt="">
        </div>
        <form method="post" action="{{ url('/comment/add', [$comment->blog->id]) }}" class="w-100">
            @csrf
            <div>
                <textarea required name="content" id="content" placeholder="Comment as {{ Auth::user()->full_name }}"></textarea>
            </div>
            <button type="submit" style="float: right ;border:none; cursor: pointer;"><i
                    class="text-secondary fa-solid fa-paper-plane"></i></button>
        </form>
    </div>
</div>
