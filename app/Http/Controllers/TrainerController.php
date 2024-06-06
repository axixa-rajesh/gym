<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Trainer::all();

        return view('trainer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('trainer.create');
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
            'name' => 'required|min:2',
            'mobile' => 'required|unique:trainers',
            'image' => 'required|image',
        ]);
        $imageName ='ZymNation_' . time() . '.' .  $request->image->extension();

        $request->image->move(public_path('images'), $imageName);
        $info = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'mobile' => $request->mobile,
            'details' => $request->details,
            'image' => $imageName,
            'doj' => $request->doj,
            'status' => $request->status
        ];
        Trainer::create($info);
        return redirect('/trainers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        //
        $info = $trainer;
        return view('trainer.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        //
        $request->validate([
            'name' => 'required|min:2',
            'mobile' => 'required',
            'image' => 'image',
        ]);
        $trainer->user_id = Auth::user()->id;
        if ($request->image) {
            $imageName = 'ZymNation_' . time() . '.' .  $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            if ($trainer->image) {
                unlink(public_path('images/'.$trainer->image));
            }
            $trainer->image= $imageName ;
        }

        $trainer->name = $request->name;
        $trainer->mobile = $request->mobile;

        $trainer->doj = $request->doj;
        $trainer->details = $request->details;
        $trainer->status = $request->status;
        $trainer->save();
        return redirect('/trainers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        //
    }
}
