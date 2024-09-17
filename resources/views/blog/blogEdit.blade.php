@extends('layout.master')
@section('title')
    Create Post
@endsection
@section('content')
    <section class="container py-5" style="margin-top: 90px;">
        <div style="width: 50%; margin: auto; background-color: white;" class="py-3 rounded">
            <div>
                <h2 class="text-center my-1" style="font-weight: bold;font-size: 22px;">Edit Post</h2>
            </div>
            <hr>
            <div class="d-flex px-3">
                <div class="image">
                    <img class="rounded-circle" style="width: 40px;" src="{{ asset(Auth::user()->image) }}" alt="">
                </div>
                <h5 class="mx-3" style="font-weight: 200">{{ Auth::user()->full_name }}</h5>
            </div>
            <div class="create-post px-3">
                <form action="{{ url('blog/edit', [$blog->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div>
                        <textarea required name="content" id="content" placeholder="What's on your mind, {{ Auth::user()->fname }}?">{{ $blog->content }}</textarea>
                    </div>
                    <div>
                        <div id="img-preview"><img src="{{ asset($blog->image) }}" alt=""></div>
                    </div>
                    <div class="d-flex justify-content-between w-100 py-2 px-3 border rounded align-items-center">
                        <p class="p-0 m-0">Update your post</p>
                        <input type="file" accept="images/*" name="image" id="image" onClick="showModal()" style="display:none"/>
                        
                        <span style="cursor: pointer;" onClick="showModal()"><i class="text-success fa-2x fa-solid fa-image"></i></span>
                    </div>
                    <button type="submit" class="btn btn-block mt-3 btn-default">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
