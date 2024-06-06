<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Member;

use App\Models\Trainer;

use App\Models\Trainerpayment;
use Illuminate\Http\Request;

class TrainerpaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return view('trainerpayment.create');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $memeber_id = request('member_id');
        
        if (!$memeber_id) {
            return  abort(404);
        }
        $member_info = Member::find($memeber_id);
        $trainer_data = Trainer::where('status', 'Activate')->get();
        return view('trainerpayment.create', compact('member_info', 'trainer_data'));
    }
    function gettrainerdetail($trainer_id)

    {
        $trainer_id = request('trainer_id');

        $trainer_info = trainer::find($trainer_id);
        
        return view('trainerpayment.gettrainerdetail', compact('trainer_info'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      	
        $info = [
            'user_id' => Auth::user()->id,
            'member_id' => request('member_id'),
            'member_name' => request('member_name'),
            'trainer_id' => request('trainer_id'),
            'trainer_name' => request('trainer_name'),
             'duration' => 0,
            
            'feessubmited' => request('feessubmited'),
            'dos' => request('dos'),
            'trainerdurationdate' => request('trainerdurationdate'),
            'paymentmode' => request('paymentmode'),
            'remark' => request('remark')
        ];
        trainerpayment::create($info);
        return redirect('/members');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trainerpayment  $trainerpayment
     * @return \Illuminate\Http\Response
     */
    public function show(Trainerpayment $trainerpayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trainerpayment  $trainerpayment
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainerpayment $trainerpayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trainerpayment  $trainerpayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainerpayment $trainerpayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trainerpayment  $trainerpayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainerpayment $trainerpayment)
    {
        //
    }
}
