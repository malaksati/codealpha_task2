<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function blog_like($id) {
        $like = new Like();
        $like->blog_id = $id;
        $like->user_id = Auth::user()->id;
        $like->like_type = 'blog';
        $like->save();
        $like_count = $like->blog->likes->count();
        // dd($like_count);
        return response()->json(['success'=>true,'blog'=>'blog_'.$id,'blog_count'=>$like_count]);
    }
    public function comment_like($id) {
        $like = new Like();
        $like->comment_id = $id;
        $like->user_id = Auth::user()->id;
        $like->like_type = 'comment';
        $like->save();
        $like_count = $like->comment->likes->count();
        return response()->json(['success'=>true,'comment'=>'comment_'.$id,'comment_count'=>$like_count]);

    }
    public function reply_like($id) {
        $like = new Like();
        $like->reply_id = $id;
        $like->user_id = Auth::user()->id;
        $like->like_type = 'reply';
        $like->save();
        $like_count = $like->reply->likes->count();
        return response()->json(['success'=>true,'reply'=>'reply_'.$id,'reply_count'=>$like_count]);

    }
}
