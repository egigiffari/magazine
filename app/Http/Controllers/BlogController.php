<?php

namespace App\Http\Controllers;
use App\post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(post $post)
    {
        // $banner = $post;
        $top4_posts = $post->latest()->limit(4)->get();
        $all_posts = $post->latest()->paginate(2);

        $all_posts->withPath('articles', 'all_posts');
        return view('blog', compact('top4_posts', 'all_posts'));
    }

    public function post($slug)
    {
        $article = post::where('slug', $slug)->firstOrFail();
        return view('post', compact('article'));
    }

    public function articles(post $post)
    {
        $all_posts = $post->latest()->paginate(10);
        return view('articles', compact('all_posts'));
    }
}
