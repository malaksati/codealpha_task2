<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index($id) {
        $blog = Blog::withCount('likes')->withCount('comments')->find($id);
        $comments = Comment::withCount('likes')->where('blog_id',$id)->get();
        $replies = Reply::withCount('likes')->where('blog_id',$id)->get();
        return view('blog.blog', compact('blog','comments','replies'));
    }
    public function create() {
        return view('blog.blogAdd');
    } 
    public function store(Request $req) {
        $blog = new Blog();
        $blog->content = $req->content;
        $blog->user_id = Auth::user()->id;
        $imgHolder = "";
        if($req->hasFile('image')){
            $image = $req->file('image');
            $name = time() . "_blog_" . "." . $image->getClientOriginalExtension();
            $destination = public_path("/uploads");
            $image->move($destination, $name);
            $imgHolder = "uploads/{$name}";
            $blog->image = $imgHolder;
        }
        $blog->save();
        return redirect('/');
    }
    public function edit($id) {
        $blog = Blog::find($id);
        return view('blog.blogEdit', compact('blog'));
    }
    public function update(Request $req, $id) {
        $blog = Blog::find($id);
        $blog->content = $req->content;
        $blog->user_id = Auth::user()->id;
        $imgHolder = "";
        if($req->hasFile('image')){
            $image = $req->file('image');
            $name = time() . "_blog_" . "." . $image->getClientOriginalExtension();
            $destination = public_path("/uploads");
            $image->move($destination, $name);
            $imgHolder = "uploads/{$name}";
            $blog->image = $imgHolder;
        }
        $blog->save();
        return redirect()->back();
    }
    public function destroy($id) {
        Blog::find($id)->delete();
        return redirect()->back();
    }
}
