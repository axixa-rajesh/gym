<?php

namespace App\Http\Controllers;

use App\Models\imgtable;
use Illuminate\Http\Request;

class ImgtableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('imgtable.index',['data'=>imgtable::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('imgtable.create');
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

        $request->validate([
            'title' => 'required',
            'image' => 'required',
            
        ]);
        $imageName = 'ZymNation_' . time() . '.' .  $request->image->extension();

        $request->image->move(public_path('images'), $imageName);
        $info = [
            
            'title' => $request->title,
            'image' => $imageName,
            
            'description' => $request->description,
            'headerimage' => $request->headerimage,
            'backgroundimage' => $request->backgroundimage,
        ];
        imgtable::create($info);
        return redirect('/myimages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\imgtable  $imgtable
     * @return \Illuminate\Http\Response
     */
    public function show(imgtable $imgtable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\imgtable  $imgtable
     * @return \Illuminate\Http\Response
     */
    public function edit(imgtable $imgtable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\imgtable  $imgtable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, imgtable $imgtable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\imgtable  $imgtable
     * @return \Illuminate\Http\Response
     */
    public function destroy(imgtable $imgtable,$id)
    {
        //
        $imgtable= $imgtable->find($id);
        unlink(public_path('images/' . $imgtable->image));
        $imgtable->delete();
        return redirect('/myimages');

    }
}
