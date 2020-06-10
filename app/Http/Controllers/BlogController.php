<?php

namespace App\Http\Controllers;

use App\Category;
use App\post;
use App\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index(post $post)
    {
        // Populer Post
        $populer = post::orderBy('views_post', 'desc')->limit(5)->get();

        // load all category
        $categories = Category::all();

        // load all tags
        $tags = tag::all();

        // $banner = $post;
        $top_banner = $post->orderBy('views_post', 'desc')->limit(3)->get();
        $top4_posts = $post->latest()->limit(4)->get();
        $all_posts = $post->latest()->paginate(8);
        // dd($top_banner);

        $all_posts->withPath('articles', 'all_posts');
        return view('blog', compact('top_banner', 'top4_posts', 'all_posts', 'populer', 'categories', 'tags'));
    }

    public function post($slug)
    {
        // Populer Post
        $populer = post::orderBy('views_post', 'desc')->limit(5)->get();

        // load all category
        $categories = Category::all();

        // load all tags
        $tags = tag::all();

        $article = post::where('slug', $slug)->firstOrFail();

        $blogKey = 'blog_' . $article->id;
        if (!Session::has($blogKey)) {
            $article->increment('views_post');
            Session::put($blogKey, 1);
        }
        return view('post', compact('article', 'populer', 'categories', 'tags'));
    }

    public function articles(post $post)
    {
        // Populer Post
        $populer = post::orderBy('views_post', 'desc')->limit(5)->get();

        // load all category
        $categories = Category::all();

        // load all tags
        $tags = tag::all();

        $all_posts = $post->latest()->paginate(10);
        return view('articles', compact('all_posts', 'populer', 'categories', 'tags'));
    }

    public function categories(category $category)
    {
        // Populer Post
        $populer = post::orderBy('views_post', 'desc')->limit(5)->get();

        // load all category
        $categories = Category::all();

        // load all tags
        $tags = tag::all();

        $all_posts = $category->posts()->paginate(10);
        return view('articles', compact('all_posts','populer', 'categories', 'tags'));
    }

    public function tags(tag $tag)
    {
        // Populer Post
        $populer = post::orderBy('views_post', 'desc')->limit(5)->get();

        // load all category
        $categories = Category::all();

        // load all tags
        $tags = tag::all();

        $all_posts = $tag->posts()->paginate(10);
        return view('articles', compact('all_posts','populer', 'categories', 'tags'));
    }

    public function search(request $request)
    {
        // Populer Post
        $populer = post::orderBy('views_post', 'desc')->limit(5)->get();

        // load all category
        $categories = Category::all();

        // load all tags
        $tags = tag::all();

        $all_posts = post::where('judul', $request->search)->orWhere('judul', "like", "%" . $request->search . "%")->paginate(10);
        return view('articles', compact('all_posts','populer', 'categories', 'tags'));
    }
}
