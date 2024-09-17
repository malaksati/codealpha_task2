<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $user = User::find(Auth::user()->id);
        $blogs = Blog::where('user_id',Auth::user()->id)->withCount('likes')->withCount('comments')->get();
        return view('auth.user', compact('user','blogs'));
    }
    public function edit() {
        $user = User::find(Auth::user()->id);
        return view('auth.userEdit', compact('user'));
    }
    public function update(Request $req) {
        $user = User::find(Auth::user()->id);
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->gender = $req->gender;
        $user->birthdate = $req->birthdate;
        $imgHolder = "";
        $coverHolder = "";
        if($req->hasFile('image')){
            $image = $req->file('image');
            $name = time() . "_profile_" . "." . $image->getClientOriginalExtension();
            $destination = public_path("/uploads");
            $image->move($destination, $name);
            $imgHolder = "uploads/{$name}";
            $user['image'] = $imgHolder;
        }else {
            $user['image'] = "uploads/default-profile.jpg";
        }
        if($req->hasFile('cover')){
            $image = $req->file('cover');
            $name = time() . "_cover_" . "." . $image->getClientOriginalExtension();
            $destination = public_path("/uploads");
            $image->move($destination, $name);
            $coverHolder = "uploads/{$name}";
            $user['cover'] = $coverHolder;
        }else {
            $user['cover'] = "uploads/default-cover.png";
        }
        $user->save();
        return redirect('profile');
    }
}
