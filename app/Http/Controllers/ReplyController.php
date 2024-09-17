<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class ReplyController extends Controller
{
    public function add($id, Request $req) {
        $reply = new Reply();
        $reply->content = $req->content;
        $reply->user_id = Auth::user()->id;
        $reply->comment_id = $id;
        $reply->blog_id = $req->blog_id;
        $reply->save();
        return redirect()->back();
    }
    public function add1($id, Request $req) {
        $reply = new Reply();
        $reply->content = $req->content;
        $reply->user_id = Auth::user()->id;
        $reply->comment_id = $id;
        $reply->blog_id = $req->blog_id;
        $reply->save();
        $comments = Comment::withCount('likes')->where('blog_id',$req->blog_id)->get();
        $replies = Reply::withCount('likes')->where('blog_id',$req->blog_id)->get();
        return view('blog.comment',compact('comments','replies'));
    }
}
