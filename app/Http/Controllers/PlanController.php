<?php

namespace App\Http\Controllers;

use App\Models\plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Plan::all();
        return view('plan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('plan.create');

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
            'name' => 'required',
            'duration'=>'required',
            'fees' => 'required'
        ]);
        $info = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'duration' => $request->duration,
            'fees' => $request->fees,
            'discount' => $request->discount,
            'description' => $request->description,
            'status' => $request->status,
        ];
        Plan::create($info);
        return redirect('/plans');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(plan $plan)
    {
        //
        $info = $plan;
        return view('plan.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, plan $plan)
    {
        //
        $request->validate([
            'name' => 'required',
            'duration' => 'required',
            'fees' => 'required'
        ]);
        
            $plan->user_id = Auth::user()->id;
            $plan->name = $request->name;
            $plan->duration = $request->duration;
            $plan->fees = $request->fees;
            $plan->discount = $request->discount;
            $plan->description = $request->description;
            $plan->status = $request->status;
            $plan->save();
        return redirect('/plans');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(plan $plan)
    {
        //
    }
}
