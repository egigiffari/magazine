<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::paginate(8);
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Respons
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3'
        ]);

       $category = Category::create([
           'name' => $request->name,
           'slug' => Str::slug($request->name)
       ]);


       return redirect()->back()->with('success', 'Category Has Been Created');
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
        $category = Category::findorfail($id);
        return view('admin.category.edit', compact('category'));
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
            'name' => 'required|min:3'
        ]);

        $category_old = Category::findorfail($id);

        $category_data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        $category = Category::whereId($id)->update($category_data);

        return redirect()->route('category.index')->with("success", "Category : <strong>$category_old->name</strong> , Modify to <strong>$request->name</strong>");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findorfail($id);
        $category->delete();

        return redirect()->back()->with('success', "Category : <strong>$category->name</strong> Has Been Deleted"); 
    }
}