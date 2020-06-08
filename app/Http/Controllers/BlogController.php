<?php

namespace App\Http\Controllers;
use App\post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(post $post)
    {
        // $banner = $post;
        $top4_posts = $post->orderBy('created_at', 'desc')->limit(4)->get();
        $all_posts = $post->orderBy('created_at', 'desc')->get();
        return view('blog', compact('top4_posts', 'all_posts'));
    }
}
