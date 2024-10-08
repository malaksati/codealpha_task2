<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $blogs = Blog::orderBy('created_at','desc')->withCount('likes')->withCount('comments')->get();
        return view('index', compact('blogs'));
    }
}
