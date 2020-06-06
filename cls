[33mcommit e553e999e58e1b9023dc9028a241f1882762edfd[m[33m ([m[1;36mHEAD -> [m[1;32mmaster[m[33m)[m
Author: egigiffari <egisipayung3@gmail.com>
Date:   Sat Jun 6 09:27:18 2020 +0700

    Add Fiture Tags (Create)

[1mdiff --git a/app/Http/Controllers/TagController.php b/app/Http/Controllers/TagController.php[m
[1mnew file mode 100644[m
[1mindex 0000000..24cffba[m
[1m--- /dev/null[m
[1m+++ b/app/Http/Controllers/TagController.php[m
[36m@@ -0,0 +1,113 @@[m
[32m+[m[32m<?php[m
[32m+[m
[32m+[m[32mnamespace App\Http\Controllers;[m
[32m+[m
[32m+[m[32muse App\tag;[m
[32m+[m[32muse Illuminate\Support\Str;[m
[32m+[m[32muse Illuminate\Http\Request;[m
[32m+[m
[32m+[m[32mclass TagController extends Controller[m
[32m+[m[32m{[m
[32m+[m[32m    /**[m
[32m+[m[32m     * Display a listing of the resource.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @return \Illuminate\Http\Response[m
[32m+[m[32m     */[m
[32m+[m[32m    public function index()[m
[32m+[m[32m    {[m
[32m+[m[32m        $tags = tag::paginate(8);[m
[32m+[m[32m        return view('admin.tags.index', compact('tags'));[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    /**[m
[32m+[m[32m     * Show the form for creating a new resource.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @return \Illuminate\Http\Response[m
[32m+[m[32m     */[m
[32m+[m[32m    public function create()[m
[32m+[m[32m    {[m
[32m+[m[32m        return view('admin.tags.create');[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    /**[m
[32m+[m[32m     * Store a newly created resource in storage.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @param  \Illuminate\Http\Request  $request[m
[32m+[m[32m     * @return \Illuminate\Http\Response[m
[32m+[m[32m     */[m
[32m+[m[32m    public function store(Request $request)[m
[32m+[m[32m    {[m
[32m+[m[32m        $this->validate($request, [[m
[32m+[m[32m            'name' => 'required|min:2'[m
[32m+[m[32m        ]);[m
[32m+[m
[32m+[m[32m        $tags = tag::create([[m
[32m+[m[32m            'name' => $request->name,[m
[32m+[m[32m            'slug' => Str::slug($request->name)[m
[32m+[m[32m        ]);[m
[32m+[m
[32m+[m[32m        return redirect()->back()->with('success', "tags : <strong>$request->name</strong> Has Been Created");[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    /**[m
[32m+[m[32m     * Display the specified resource.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @param  int  $id[m
[32m+[m[32m     * @return \Illuminate\Http\Response[m
[32m+[m[32m     */[m
[32m+[m[32m    public function show($id)[m
[32m+[m[32m    {[m
[32m+[m[32m        //[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    /**[m
[32m+[m[32m     * Show the form for editing the specified resource.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @param  int  $id[m
[32m+[m[32m     * @return \Illuminate\Http\Response[m
[32m+[m[32m     */[m
[32m+[m[32m    public function edit($id)[m
[32m+[m[32m    {[m
[32m+[m[32m        $tag = tag::findorfail($id);[m
[32m+[m
[32m+[m[32m        return view('admin.tags.edit', compact('tag'));[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    /**[m
[32m+[m[32m     * Update the specified resource in storage.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @param  \Illuminate\Http\Request  $request[m
[32m+[m[32m     * @param  int  $id[m
[32m+[m[32m     * @return \Illuminate\Http\Response[m
[32m+[m[32m     */[m
[32m+[m[32m    public function update(Request $request, $id)[m
[32m+[m[32m    {[m
[32m+[m[32m        $this->validate($request, [[m
[32m+[m[32m            'name' => 'required|min:2'[m
[32m+[m[32m        ]);[m
[32m+[m
[32m+[m[32m        $tags_old = tag::findorfail($id);[m
[32m+[m[32m        $tags_new = [[m
[32m+[m[32m            'name' => $request->name,[m
[32m+[m[32m            'slug' => Str::slug($request->name)[m
[32m+[m[32m        ];[m
[32m+[m
[32m+[m[32m        $tags = tag::whereId($id)->update($tags_new);[m
[32m+[m
[32m+[m[32m        return redirect()->route('tags.index')->with('success', "Tag : <strong>$tags_old->name</strong>, Modify to <strong>$request->name</strong> ");[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    /**[m
[32m+[m[32m     * Remove the specified resource from storage.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @param  int  $id[m
[32m+[m[32m     * @return \Illuminate\Http\Response[m
[32m+[m[32m     */[m
[32m+[m[32m    public function destroy($id)[m
[32m+[m[32m    {[m
[32m+[m[32m        $tags = tag::findorfail($id);[m
[32m+[m[32m        $tags->delete();[m
[32m+[m
[32m+[m[32m        return redirect()->back()->with('success', "Tags : <strong>$tags->name</strong> Has Been Deleted");[m
[32m+[m[32m    }[m
[32m+[m[32m}[m
[1mdiff --git a/app/tag.php b/app/tag.php[m
[1mnew file mode 100644[m
[1mindex 0000000..027af49[m
[1m--- /dev/null[m
[1m+++ b/app/tag.php[m
[36m@@ -0,0 +1,10 @@[m
[32m+[m[32m<?php[m
[32m+[m
[32m+[m[32mnamespace App;[m
[32m+[m
[32m+[m[32muse Illuminate\Database\Eloquent\Model;[m
[32m+[m
[32m+[m[32mclass tag extends Model[m
[32m+[m[32m{[m
[32m+[m[32m    protected $fillable = ['name', 'slug'];[m
[32m+[m[32m}[m
[1mdiff --git a/database/migrations/2020_06_05_053605_create_tags_table.php b/database/migrations/2020_06_05_053605_create_tags_table.php[m
[1mnew file mode 100644[m
[1mindex 0000000..4ef55fc[m
[1m--- /dev/null[m
[1m+++ b/database/migrations/2020_06_05_053605_create_tags_table.php[m
[36m@@ -0,0 +1,33 @@[m
[32m+[m[32m<?php[m
[32m+[m
[32m+[m[32muse Illuminate\Database\Migrations\Migration;[m
[32m+[m[32muse Illuminate\Database\Schema\Blueprint;[m
[32m+[m[32muse Illuminate\Support\Facades\Schema;[m
[32m+[m
[32m+[m[32mclass CreateTagsTable extends Migration[m
[32m+[m[32m{[m
[32m+[m[32m    /**[m
[32m+[m[32m     * Run the migrations.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @return void[m
[32m+[m[32m     */[m
[32m+[m[32m    public function up()[m
[32m+[m[32m    {[m
[32m+[m[32m        Schema::create('tags', function (Blueprint $table) {[m
[32m+[m[32m            $table->bigIncrements('id');[m
[32m+[m[32m            $table->string('name');[m
[32m+[m[32m            $table->string('slug');[m
[32m+[m[32m            $table->timestamps();[m
[32m+[m[32m        });[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    /**[m
[32m+[m[32m     * Reverse the migrations.[m
[32m+[m[32m     *[m
[32m+[m[32m     * @return void[m
[32m+[m[32m     */[m
[32m+[m[32m    public function down()[m
[32m+[m[32m    {[m
[32m+[m[32m        Schema::dropIfExists('tags');[m
[32m+[m[32m    }[m
[32m+[m[32m}[m
[1mdiff --git a/resources/views/admin/tags/create.blade.php b/resources/views/admin/tags/create.blade.php[m
[1mnew file mode 100644[m
[1mindex 0000000..758dc1f[m
[1m--- /dev/null[m
[1m+++ b/resources/views/admin/tags/create.blade.php[m
[36m@@ -0,0 +1,33 @@[m
[32m+[m[32m@extends('template_backend.home')[m
[32m+[m[32m@section('head_title', 'Add Tags')[m
[32m+[m[32m@section('title_content', 'Add Tags')[m
[32m+[m[32m@section('content')[m
[32m+[m
[32m+[m
[32m+[m[32m    @if(count($errors)>0)[m
[32m+[m[32m        @foreach($errors->all() as $error)[m
[32m+[m[32m        <div class="alert alert-danger" role="alert">[m
[32m+[m[32m            {{ $error }}[m
[32m+[m[32m        </div>[m
[32m+[m
[32m+[m[32m        @endforeach[m
[32m+[m[32m    @endif[m
[32m+[m
[32m+[m[32m    @if(Session::has('success'))[m
[32m+[m[32m        <div class="alert alert-success" role="alert">[m
[32m+[m[32m             {!! Session('success') !!}[m
[32m+[m[32m        </div>[m
[32m+[m[32m    @endif[m
[32m+[m
[32m+[m[32m    <form action="{{ route('tags.store') }}" method="post">[m
[32m+[m[32m        @csrf[m
[32m+[m[32m        <div class="form-group">[m
[32m+[m[32m            <label for="tags">Tags</label>[m
[32m+[m[32m            <input type="text" name="name" id="tags" class="form-control">[m
[32m+[m[32m        </div>[m
[32m+[m[32m        <div class="form-group">[m
[32m+[m[32m            <button class="btn btn-primary">Save Tags</button>[m
[32m+[m[32m        </div>[m
[32m+[m[32m    </form>[m
[32m+[m
[32m+[m[32m@endsection[m
\ No newline at end of file[m
[1mdiff --git a/resources/views/admin/tags/edit.blade.php b/resources/views/admin/tags/edit.blade.php[m
[1mnew file mode 100644[m
[1mindex 0000000..2022464[m
[1m--- /dev/null[m
[1m+++ b/resources/views/admin/tags/edit.blade.php[m
[36m@@ -0,0 +1,33 @@[m
[32m+[m[32m@extends('template_backend.home')[m
[32m+[m[32m@section('head_title', 'Edit Tags')[m
[32m+[m[32m@section('title_content', 'Edit Tags')[m
[32m+[m[32m@section('content')[m
[32m+[m
[32m+[m[32m    @if(count($errors)>0)[m
[32m+[m[32m        @foreach($errors->all() as $error)[m
[32m+[m[32m        <div class="alert alert-danger" role="alert">[m
[32m+[m[32m            {{ $error }}[m
[32m+[m[32m        </div>[m
[32m+[m[32m        @endforeach[m
[32m+[m[32m    @endif[m
[32m+[m
[32m+[m[32m    @if(Session::has('success'))[m
[32m+[m[32m        <div class="alert alert-success" role="alert">[m
[32m+[m[32m             {{ Session('success') }}[m
[32m+[m[32m        </div>[m
[32m+[m[32m    @endif[m
[32m+[m
[32m+[m[32m    <form action="{{ route('tags.update', $tag->id) }}" method="post">[m
[32m+[m[32m        @csrf[m
[32m+[m[32m        @method('patch')[m
[32m+[m[32m        <div class="form-group">[m
[32m+[m[32m            <label for="tag">Tag</label>[m[41m  [m
[32m+[m[32m            <input type="text" name="name" id="tag" class="form-control" value="{{ $tag->name }}">[m
[32m+[m[32m        </div>[m
[32m+[m[32m        <div class="form-group">[m
[32m+[m[32m            <button class="btn btn-primary">Save Tag</button>[m
[32m+[m[32m        </div>[m
[32m+[m[32m    </form>[m
[32m+[m
[32m+[m
[32m+[m[32m@endsection[m
\ No newline at end of file[m
[1mdiff --git a/resources/views/admin/tags/index.blade.php b/resources/views/admin/tags/index.blade.php[m
[1mindex d4ae606..f99e914 100644[m
[1m--- a/resources/views/admin/tags/index.blade.php[m
[1m+++ b/resources/views/admin/tags/index.blade.php[m
[36m@@ -2,4 +2,43 @@[m
 @section('head_title', 'Tags')[m
 @section('title_content', 'Tags')[m
 @section('content')[m
[32m+[m
[32m+[m[32m@if(Session::has('success'))[m
[32m+[m[32m        <div class="alert alert-success" role="alert">[m
[32m+[m[32m             {!! Session('success') !!}[m
[32m+[m[32m        </div>[m
[32m+[m[32m    @endif[m
[32m+[m
[32m+[m[32m    <a href="{{ route('tags.create') }}" class="btn btn-info btn-sm">Add tags</a>[m
[32m+[m[32m    <br>[m
[32m+[m[32m    <br>[m
[32m+[m[32m    <table class="table table-striped table-hover table-sm table-bordered">[m
[32m+[m[32m        <thead>[m
[32m+[m[32m            <th>No</th>[m
[32m+[m[32m            <th>Tag</th>[m
[32m+[m[32m            <th>Action</th>[m
[32m+[m[32m        </thead>[m
[32m+[m[32m        <tbody>[m
[32m+[m
[32m+[m[32m        @foreach ($tags as $result => $hasil)[m
[32m+[m[32m            <tr>[m
[32m+[m[32m                <td> {{ $result + $tags->firstitem() }} </td>[m
[32m+[m[32m                <td>{{ $hasil->name }}</td>[m
[32m+[m[32m                <td>[m
[32m+[m[32m                    <form action="{{ route('tags.destroy', $hasil->id) }}" method="post">[m
[32m+[m[32m                        @csrf[m
[32m+[m[32m                        @method('delete')[m
[32m+[m[32m                        <a href="{{ route('tags.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>[m
[32m+[m[32m                        <button class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete this item')">Delete</button>[m
[32m+[m[32m                    </form>[m
[32m+[m[32m                </td>[m
[32m+[m[32m            </tr>[m
[32m+[m[32m        @endforeach[m
[32m+[m
[32m+[m[32m        </tbody>[m
[32m+[m[32m    </table>[m
[32m+[m
[32m+[m[32m    {{ $tags->links() }}[m
[32m+[m
[32m+[m
 @endsection()[m
\ No newline at end of file[m
[1mdiff --git a/routes/web.php b/routes/web.php[m
[1mindex 7f6c9aa..694c88f 100644[m
[1m--- a/routes/web.php[m
[1m+++ b/routes/web.php[m
[36m@@ -22,4 +22,6 @@[m [mRoute::get('/home', function (){[m
 });[m
 [m
 [m
[31m-Route::resource('/category', 'CategoryController');[m
\ No newline at end of file[m
[32m+[m[32mRoute::resource('/category', 'CategoryController');[m
[32m+[m
[32m+[m[32mRoute::resource('/tags', 'TagController');[m
\ No newline at end of file[m
