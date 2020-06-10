<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::where('id', 1)->firstOrFail();
        // dd($about);
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
            'name' => 'required|min:3',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required|min:3',
            'desc' => 'required|min:3',
            'our_vision' => 'required|min:3'
        ]);
        
        $about_data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'desc' => $request->desc,
            'our_vision' => $request->our_vision
        ];
        $about = about::whereId($id)->update($about_data);

        return  redirect()->back()->with('success', "Data Information Has Been Changed");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logo(Request $request, $id)
    {
        $this->validate($request, [
            'logo' => 'required'
        ]);

        $about = About::findorfail($id);
        $logo = ['logo' => $request->logo];
        $about->update($logo);

        $logo = $request->logo;
        $new_logo = time().$logo;
        $logo->move('public/uploads/posts/', $new_logo);

        return redirect()->back()->with('success', 'Logo Has Been Changed');
        
    }
}
