<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Member::with('payments','user')->orderBy('doj','desc')->get();
   
        return view('member.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('member.create');
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
            'mobile' => 'required|unique:members'
        ]);
        $info = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'mobile' => $request->mobile,
            'dob' => $request->dob,
            'email' => $request->email,
            'gender' => $request->gender,
            'address' => $request->address,
            'height' => $request->height,
            'weight' => $request->weight,
            'doj' => $request->doj,
            'status' => $request->status,
        ];
        Member::create($info);
        return redirect('/members');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $info = $member;
        return view('member.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
        $request->validate([
            'name' => 'required|min:2',
            'mobile' => 'required'
        ]);
        $member->user_id = Auth::user()->id;
        $member->name = $request->name;
        $member->mobile = $request->mobile;
        $member->dob = $request->dob;
        $member->email = $request->email;
        $member->gender = $request->gender;
        $member->address = $request->address;
        $member->height = $request->height;
        $member->weight = $request->weight;
        $member->doj = $request->doj;
        $member->status = $request->status;
        $member->save();
        return redirect('/members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
