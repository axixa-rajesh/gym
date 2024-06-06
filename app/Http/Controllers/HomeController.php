<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Member;
use App\Models\Payment;
use App\Models\Trainer;
use App\Models\plan;
use App\Models\imgtable;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function main()
    {
        return view('main', ['data' => Trainer::where('status', 'Activate')->get(), 'pdata' => plan::where('status', 'Activate')->orderBy('created_at', 'desc')->get()->take(3), 'idata' => imgtable::where('headerimage', 'no')->orderBy('created_at', 'desc')->get()]);
    }
    public function about()
    {
        return view('about');
    }
    public function plan()
    {
        return view('plan', ['data' => plan::where('status', 'Activate')->get()]);
    }
    public function trainer()
    {

        return view('trainer', ['data' => Trainer::where('status', 'Activate')->get()]);
    }
    public function index()
    {
        $this->middleware('auth');
        $data = Payment::select('member_id', DB::raw('MAX(planexpiredate) as planexpiredate'))
            ->groupBy('member_id')->having('planexpiredate', '<', date('Y-m-d', time() + 86400 * 3))
            ->get();
        $ndata = Member::leftJoin('payments', 'members.id', '=', 'payments.member_id')
            ->whereNull('payments.member_id')
            ->where('status', 'Activate')
            ->select('members.id as id', 'members.name as name', 'members.mobile as mobile')
            ->get();
        return view('home', compact('data', 'ndata'));
    }
}
