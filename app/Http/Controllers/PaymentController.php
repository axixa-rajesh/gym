<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\plan;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $memeber_id=request('member_id');
        if(!$memeber_id){
            return  abort(404);
        }
        $member_info=Member::find($memeber_id);
        $plan_data=plan::where('status','Activate')->get();
        return view('payment.create',compact('member_info','plan_data'));
    }
    function getplandetail($plan_id){
        $plan_id = request('plan_id');

        $plan_info = plan::find($plan_id);
        return view('payment.getplandetail',compact('plan_info'));
    }
    function getslip($id){
        $info = Payment::find($id);
        return view('payment.getslip', compact('info'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //id	user_id	member_id	member_name	plan_id	plan_name	duration	plan_fees	plan_discount	extradiscount	feessubmited	dos	planexpiredate	paymentmode	remark
        $info=[
            'user_id'=> Auth::user()->id,    'member_id'=>request('member_id'),    'member_name'=>request('member_name'),    'plan_id'=>request('plan_id'),    'plan_name'=>request('plan_name'),    'duration'=>request('duration'),    'plan_fees'=>request('plan_fees'),    'plan_discount'=>request('plan_discount'),    'extradiscount'=>request('extradiscount'),    'feessubmited'=>request('feessubmited'),    'dos'=>request('dos'),    'planexpiredate'=>request('planexpiredate'),    'paymentmode'=>request('paymentmode'),    'remark'=>request('remark') ];
            Payment::create($info);
        return redirect('/members');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
