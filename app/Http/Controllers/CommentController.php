<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function add($id, Request $req) {
        $comment = new Comment();
        $comment->content = $req->content;
        $comment->user_id = Auth::user()->id;
        $comment->blog_id = $id;
        $comment->save();
        return redirect()->back();
    }
    public function comment($id) {
        $comments = Comment::withCount('likes')->where('blog_id',$id)->get();
        $replies = Reply::withCount('likes')->where('blog_id',$id)->get();
        return view('blog.comment',compact('comments','replies'));
    }
}
