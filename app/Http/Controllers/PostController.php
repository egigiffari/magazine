<?php

namespace App\Http\Controllers;

use App\About;
use App\Category;
use App\post;
use App\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = tag::all();
        $category = Category::all();
        return view('admin.posts.create', compact('category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:3',
            'category_id' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);

        $gambar = $request->image;
        $new_gambar = time().$gambar->getClientOriginalName();

        $posts = post::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => 'public/uploads/posts/' . $new_gambar,
            'user_id' => Auth::id()
        ]);

        $posts->tags()->attach($request->tags);

        $gambar->move('public/uploads/posts/', $new_gambar);

        return redirect()->back()->with('success', "Post <strong>$request->judul</strong> Has Been Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::findorfail($id);
        $category = Category::all();
        $tags = tag::all();
        return view('admin.posts.edit', compact('post', 'category', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required|min:3',
            'category_id' => 'required',
            'content' => 'required'
        ]);
        
        $post_old = post::findorfail($id);
        $post = post::findorfail($id);

        $post_data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'category_id' => $request->category_id,
            'content' => $request->content
            // 'gambar' => 'public/uploads/posts/' . $new_gambar
        ];        
        
        if ($request->has('image')) {
            $gambar = $request->image;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/logo/', $new_gambar);
            $post_data['gambar'] = 'public/uploads/posts/' . $new_gambar;

        }

        // dd($post_data);
        
        $post->tags()->sync($request->tags);
        $post->update($post_data);
        
        return redirect()->back()->with('success', "Post : <strong>$post_old->judul</strong> Modify To <strong>$request->judul</strong>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::findorfail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', "Post : <strong>$post->judul</strong> Moved To Trash");
    }

    public function trash_posts()
    {
        $posts = post::onlyTrashed()->paginate(10);
        return view('admin.posts.trash', compact('posts'));
    }

    public function restore_posts($id)
    {
        $post = post::withTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect()->back()->with('success', "Post : <strong>$post->judul</strong> Has Been Restore");
    }

    public function permanent_delete($id)
    {
        $post = post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        return redirect()->back()->with('success', "Post : <strong>$post->judul</strong> Has Been Permanent Delete");
    }
}
