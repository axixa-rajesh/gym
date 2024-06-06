@extends('layouts.app')
@section('bread')
    <div class="breadcrumb-text">
        <h2>Home</h2>
        <div class="bt-option">
            <a href="/">Dashbord</a>
            <span> Dashboard</span>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-2">
                @include('layouts.leftbar')
            </div>
            <div class="col-9" style="border-radius: 6px; border:1px solid #444; box-shadow:1px 1px 5px #000;">
   <div class="card mt-2">
                    @if(count($ndata))
                    <div class="card-header h4">{{ __('New members which have not submitted fees yet:') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }} {{ __('You are logged in!') }}
                            </div>
                        @endif

                        <table class="table table-striped table-dark table-responsive ">
                            <thead>
                                <tr>
                                    <th style="color:#f36100">S.No.</th>
                                    <th style="color:#f36100">Name Of Member</th>
                                    <th style="color:#f36100">Mobile </th>
                                   <th style="color:#f36100">Pay</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ndata as $info)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $info->name }}
                                        </td>
                                        <td>
                                            {{ $info->mobile }}
                                        </td>
                                     
                                        <td>
                                            <a href="/payment/{{ $info['id'] }}"
                                                class="btn btn-success btn-sm">Fees</a>
                                        </td>
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
                {{-- plan expire in three days --}}
                <div class="card mt-2">
                    <div class="card-header h4">{{ __('Plan will expire in 3 Days') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }} {{ __('You are logged in!') }}
                            </div>
                        @endif

                        <table class="table table-striped table-dark table-responsive ">
                            <thead>
                                <tr>
                                    <th style="color:#f36100">S.No.</th>
                                    <th style="color:#f36100">Name Of Member</th>
                                    <th style="color:#f36100">Mobile </th>
                                    <th style="color:#f36100">Expire Date</th>
                                    <th style="color:#f36100">Pay</th>
                                    <th style="color:#f36100">History</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $info)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $info->member->name }}
                                        </td>
                                        <td>
                                            {{ $info->member->mobile }}
                                        </td>
                                        <td>
                                            {{ date('d-M-Y', strtotime($info->planexpiredate)) }}
                                        </td>
                                        <td>
                                            <a href="/payment/{{ $info['member_id'] }}"
                                                class="btn btn-success btn-sm">Fees</a>
                                        </td>
                                        <td>
                                            <div class="container">

                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#myModal_{{ $info['member']->id }}">History</button>

                                                <!-- Modal -->
                                                <div class="modal fade " id="myModal_{{ $info['member']->id }}"
                                                    role="dialog">
                                                    <div class="modal-dialog modal-xl">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Details of
                                                                    {{ $info['member']->name . ' - ' . $info['member']->mobile }}
                                                                </h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>

                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container">
                                                                    <div class="row  bg-dark">
                                                                        <div class="col-12">
                                                                            <div class="row mb-2">
                                                                                <div class="col-lg-3 col-sm-6 text-right">
                                                                                    Name:
                                                                                </div>

                                                                                <div class="col-lg-3 col-sm-6 txtcontant">
                                                                                    {{ $info['member']->name }}
                                                                                </div>

                                                                                <div class="col-lg-3 col-sm-6 text-right">
                                                                                    Mobile:
                                                                                </div>

                                                                                <div class="col-lg-3 col-sm-6 txtcontant">
                                                                                    {{ $info['member']->mobile }}
                                                                                </div>
                                                                                @if ($info['member']->dob)
                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 text-right">
                                                                                        Date Of Birth:
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 txtcontant">
                                                                                        {{ date('d-M-Y', strtotime($info['member']->dob)) }}
                                                                                    </div>
                                                                                @endif
                                                                                @if ($info['member']->gender)
                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 text-right">
                                                                                        Gender:
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 txtcontant">
                                                                                        {{ $info['member']->gender }}
                                                                                    </div>
                                                                                @endif
                                                                                @if ($info['member']->email)
                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 text-right">
                                                                                        Email:
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 txtcontant">
                                                                                        {{ $info['member']->email }}
                                                                                    </div>
                                                                                @endif
                                                                                @if ($info['member']->height)
                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 text-right">
                                                                                        Height:
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 txtcontant">
                                                                                        {{ $info['member']->height }}
                                                                                    </div>
                                                                                @endif
                                                                                @if ($info['member']->weight)
                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 text-right">
                                                                                        Weight:
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 txtcontant">
                                                                                        {{ $info['member']->weight }}
                                                                                    </div>
                                                                                @endif
                                                                                @if ($info['member']->doj)
                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 text-right">
                                                                                        Date of Joing:
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 txtcontant">
                                                                                        {{ $info['member']->doj }}
                                                                                    </div>
                                                                                @endif
                                                                                @if ($info['member']->address)
                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 text-right">
                                                                                        Address:
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 txtcontant">
                                                                                        {{ $info['member']->address }}
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row text-center">
                                                                    <div class="col-12 ">
                                                                        <table
                                                                            class="table table-striped table-dark table-responsive table-sm">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="color:#f36100">S.No.</th>
                                                                                    <th style="color:#f36100">Slip</th>
                                                                                    <th style="color:#f36100">Submitted On
                                                                                    </th>
                                                                                    <th style="color:#f36100">Plan Expire
                                                                                    </th>

                                                                                    <th style="color:#f36100">Name Of Plan
                                                                                    </th>
                                                                                    <th style="color:#f36100">Duration</th>
                                                                                    <th style="color:#f36100">Fees</th>
                                                                                    <th style="color:#f36100">Discount</th>
                                                                                    <th style="color:#f36100">After Discount
                                                                                        Fess
                                                                                    </th>
                                                                                    <th style="color:#f36100">Extra Discount
                                                                                    </th>

                                                                                    <th style="color:#f36100">Submited Fees
                                                                                    </th>
                                                                                    <th style="color:#f36100">Received By
                                                                                    </th>



                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($info['member']->payments as $payinfo)
                                                                                    <tr>
                                                                                        <td>
                                                                                            {{ $loop->iteration }}
                                                                                        </td>

                                                                                        <td>
                                                                                            <a href="/getslip/{{ $payinfo['id'] }}"
                                                                                                target="_blank"
                                                                                                class="btn btn-success">Print</a>
                                                                                        </td>
                                                                                        <td>
                                                                                            {{ date('d-M-Y', strtotime($payinfo['dos'])) }}
                                                                                        </td>

                                                                                        <td>
                                                                                            {{ date('d-M-Y', strtotime($payinfo['planexpiredate'])) }}
                                                                                        </td>
                                                                                        <td>
                                                                                            {{ $payinfo['plan_name'] }}
                                                                                        </td>
                                                                                        <td>{{ $payinfo['duration'] }}</td>
                                                                                        <td>{{ $payinfo['plan_fees'] }}
                                                                                        </td>
                                                                                        <td>{{ $payinfo['plan_discount'] ? $payinfo['plan_discount'] . '%' : '-' }}
                                                                                        </td>
                                                                                        <td>{{ $payinfo['plan_fees'] - ($payinfo['plan_fees'] * $payinfo['plan_discount']) / 100 }}
                                                                                        </td>
                                                                                        <td>{{ $payinfo['extradiscount'] ? $payinfo['extradiscount'] . '%' : '-' }}
                                                                                        <td>{{ $payinfo['feessubmited'] }}
                                                                                        </td>
                                                                                        <td>{{ $payinfo['user']->name }}
                                                                                        </td>

                                                                                    </tr>
                                                                                @endforeach

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
