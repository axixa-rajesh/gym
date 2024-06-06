@extends('layouts.app')
@section('bread')
    <div class="breadcrumb-text">
        <h2>Members View</h2>
        <div class="bt-option">
            <a href="/">Member</a>
            <span>View</span>
        </div>
    </div>
@endsection
@section('content')
    <style>
        .txtcontant {
            color: #f36100;
            font-weight: bold;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-2">

                @include('layouts.leftbar')
            </div>
            <div class="col-10" style="border-radius: 6px; border:1px solid #444; box-shadow:1px 1px 5px #000;">
                <div class="card bg-transparent">

                    <div class="card-header text-center">

                        <span style="color:#f36100">Memebers View</span>
                    </div>
                </div>

                <div class="card-body leave-comment" style="color:#f36100">
                    <div class="mb-3">
                        <a href="/members/create" class="btn btn-primary">New Member</a>
                    </div>
                    <table class="table table-striped table-sm table-dark table-responsive">
                        <thead>
                            <tr>
                                <th style="color:#f36100">S.No.</th>
                                <th style="color:#f36100">Plan Fees</th>
                                <th style="color:#f36100">Payment History</th>
                                <th style="color:#f36100">Trainer Fees</th>

                                <th style="color:#f36100">Name</th>
                                <th style="color:#f36100">Mobile</th>
                                <th style="color:#f36100">Date of Joining</th>
                                <th style="color:#f36100">Posted By</th>
                                <th style="color:#f36100">Created At</th>
                                <th style="color:#f36100">Updated At</th>
                                <th style="color:#f36100">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $info)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        @if ($info['status'] == 'Activate')
                                            @if (count($info->payments))
                                                @php
                                                    $p = false;
                                                    $ped = $info->payments->last()->planexpiredate;

                                                    if (time() >= strtotime($ped)) {
                                                        $p = true;
                                                    }

                                                @endphp
                                                @if ($p)
                                                    <a href="/payment/{{ $info['id'] }}"
                                                        class="btn btn-success btn-sm">Fees</a>
                                                @else
                                                    <a href="javascript:alert('Expiry Date:{{ date('d-m-Y', strtotime($ped)) }}')"
                                                        class="btn btn-warning btn-sm">Paid</a>
                                                @endif
                                            @else
                                                <a href="/payment/{{ $info['id'] }}"
                                                    class="btn btn-success btn-sm">Fees</a>
                                            @endif
                                        @else
                                            <a href="javascript:alert('User must be activate for submitting fees')"
                                                class="btn btn-secondary btn-sm">Fees</a>
                                        @endif

                                    </td>
                                    <td>
                                        @if (count($info->payments) || count($info->trainerpayments))
                                            <div class="container">

                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#myModal_{{ $info['id'] }}">History</button>

                                                <!-- Modal -->
                                                <div class="modal fade " id="myModal_{{ $info['id'] }}" role="dialog">
                                                    <div class="modal-dialog modal-xl">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Details of
                                                                    {{ $info->name . ' - ' . $info->mobile }}</h4>
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
                                                                                    {{ $info->name }}
                                                                                </div>

                                                                                <div class="col-lg-3 col-sm-6 text-right">
                                                                                    Mobile:
                                                                                </div>

                                                                                <div class="col-lg-3 col-sm-6 txtcontant">
                                                                                    {{ $info->mobile }}
                                                                                </div>
                                                                                @if ($info->dob)
                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 text-right">
                                                                                        Date Of Birth:
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 txtcontant">
                                                                                        {{ date('d-M-Y', strtotime($info->dob)) }}
                                                                                    </div>
                                                                                @endif
                                                                                @if ($info->gender)
                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 text-right">
                                                                                        Gender:
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 txtcontant">
                                                                                        {{ $info->gender }}
                                                                                    </div>
                                                                                @endif
                                                                                @if ($info->email)
                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 text-right">
                                                                                        Email:
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 txtcontant">
                                                                                        {{ $info->email }}
                                                                                    </div>
                                                                                @endif
                                                                                @if ($info->height)
                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 text-right">
                                                                                        Height:
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 txtcontant">
                                                                                        {{ $info->height }}
                                                                                    </div>
                                                                                @endif
                                                                                @if ($info->weight)
                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 text-right">
                                                                                        Weight:
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 txtcontant">
                                                                                        {{ $info->weight }}
                                                                                    </div>
                                                                                @endif
                                                                                @if ($info->doj)
                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 text-right">
                                                                                        Date of Joing:
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 txtcontant">
                                                                                        {{ $info->doj }}
                                                                                    </div>
                                                                                @endif
                                                                                @if ($info->address)
                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 text-right">
                                                                                        Address:
                                                                                    </div>

                                                                                    <div
                                                                                        class="col-lg-3 col-sm-6 txtcontant">
                                                                                        {{ $info->address }}
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if (count($info->payments))
                                                                    <h3>Gym Fees</h3>
                                                                    <div class="row text-center">
                                                                        <div class="col-12 ">
                                                                            <table
                                                                                class="table table-striped table-dark table-responsive table-sm">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th style="color:#f36100">S.No.</th>
                                                                                        <th style="color:#f36100">Slip</th>
                                                                                        <th style="color:#f36100">Submitted
                                                                                            On
                                                                                        </th>
                                                                                        <th style="color:#f36100">Plan
                                                                                            Expire
                                                                                        </th>

                                                                                        <th style="color:#f36100">Name Of
                                                                                            Plan
                                                                                        </th>
                                                                                        <th style="color:#f36100">Duration
                                                                                        </th>
                                                                                        <th style="color:#f36100">Fees</th>
                                                                                        <th style="color:#f36100">Discount
                                                                                        </th>
                                                                                        <th style="color:#f36100">After
                                                                                            Discount
                                                                                            Fess
                                                                                        </th>
                                                                                        <th style="color:#f36100">Extra
                                                                                            Discount
                                                                                        </th>

                                                                                        <th style="color:#f36100">Submited
                                                                                            Fees
                                                                                        </th>
                                                                                        <th style="color:#f36100">Received
                                                                                            By
                                                                                        </th>



                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($info->payments as $payinfo)
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
                                                                                            <td>{{ $payinfo['duration'] }}
                                                                                            </td>
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
                                                                    @endif      
                                                                    @if (count($info->trainerpayments))
                                                                        <h2>Trainer Fees Detail</h2>
                                                                        <div class="row text-center">
                                                                            <div class="col-12 ">
                                                                                <table
                                                                                    class="table table-striped table-dark table-responsive table-sm">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th style="color:#f36100">S.No.
                                                                                            </th>
                                                                                            <th style="color:#f36100">Plan
                                                                                                Starting Date
                                                                                            </th>
                                                                                            <th style="color:#f36100">Plan
                                                                                                Expire
                                                                                            </th>

                                                                                            <th style="color:#f36100">Name
                                                                                                Of
                                                                                                Trainer
                                                                                            </th>

                                                                                            <th style="color:#f36100">
                                                                                                Submited
                                                                                                Fees
                                                                                            </th>
                                                                                            <th style="color:#f36100">
                                                                                                Received
                                                                                                By
                                                                                            </th>

                                                                                            <th style="color:#f36100">
                                                                                                Payment
                                                                                                Mode
                                                                                            </th>

                                                                                            <th style="color:#f36100">Remark
                                                                                            </th>


                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach ($info->trainerpayments as $payinfo)
                                                                                            <tr>
                                                                                                <td>
                                                                                                    {{ $loop->iteration }}
                                                                                                </td>

                                                                                                <td>
                                                                                                    {{ date('d-M-Y', strtotime($payinfo['dos'])) }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    {{ date('d-M-Y', strtotime($payinfo['trainerdurationdate'])) }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    {{ $payinfo['trainer_name'] }}
                                                                                                </td>
                                                                                                <td>{{ $payinfo['feessubmited'] }}
                                                                                                </td>
                                                                                                <td>{{ $payinfo['user']->name }}
                                                                                                </td>
                                                                                                <td>{{ $payinfo['paymentmode'] }}
                                                                                                </td>
                                                                                                <td>{{ $payinfo['remark'] }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($info['status'] == 'Activate')
                                            @if (count($info->trainerpayments))
                                                @php
                                                    $p = false;
                                                    $tdd = $info->trainerpayments->last()->trainerdurationdate;

                                                    if (time() >= strtotime($tdd)) {
                                                        $p = true;
                                                    }

                                                @endphp
                                                @if ($p)
                                                    <a href="/trainerpayment/{{ $info['id'] }}"
                                                        class="btn btn-success btn-sm">Fees</a>
                                                @else
                                                    <a href="javascript:alert('Trainer Duration Expiry Date:{{ date('d-m-Y', strtotime($tdd)) }}')"
                                                        class="btn btn-warning btn-sm">Paid</a>
                                                @endif
                                            @else
                                                <a href="/trainerpayment/{{ $info['id'] }}"
                                                    class="btn btn-success btn-sm">Fees</a>
                                            @endif
                                        @else
                                            <a href="javascript:alert('User must be activate for submitting fees')"
                                                class="btn btn-secondary btn-sm">Fees</a>
                                        @endif

                                    </td>
                                    <td title="Edit">
                                        <a href="/members/{{ $info['id'] }}/edit">{{ $info['name'] }}</a>
                                    </td>
                                    <td>{{ $info['mobile'] }}</td>
                                    <td>{{ $info['doj'] ? date('d- M - y', strtotime($info['doj'])) : 'N/A' }}
                                    </td>
                                    <td>{{ $info->user->name }}</td>
                                    <td>{{ date('d- M - y', strtotime($info['created_at'])) }}</td>
                                    <td>{{ date('d- M - y', strtotime($info['updated_at'])) }}</td>
                                    <td>
                                        @if ($info['status'] == 'Activate')
                                            <b style="color:green">Activate</b>
                                        @else
                                            <b style="color:red">Deativate</b>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
