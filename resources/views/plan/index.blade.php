@extends('layouts.app')
@section('bread')
    <div class="breadcrumb-text">
        <h2>Plan View</h2>
        <div class="bt-option">
            <a href="/">Plans</a>
            <span>View</span>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-2">

                @include('layouts.leftbar')
            </div>
            <div class="col-10" style="border-radius: 6px; border:1px solid #444; box-shadow:1px 1px 5px #000;">
                <div class="card bg-transparent">

                    <div class="card-header text-center">

                        <span style="color:#f36100">Plans View</span>
                    </div>
                </div>

                <div class="card-body leave-comment" style="color:#f36100">
                                        <div class="mb-3">
                        <a href="/plans/create" class="btn btn-primary">New Plan</a>
                    </div>
                    <table class="table table-striped table-dark table-responsive ">
                        <thead>
                            <tr>
                                <th style="color:#f36100">S.No.</th>
                                <th style="color:#f36100">Name Of Plan</th>
                                <th style="color:#f36100">Duration</th>
                                <th style="color:#f36100">Fees</th>
                                <th style="color:#f36100">Discount</th>
                                <th style="color:#f36100">Final Fess</th>
                                <th style="color:#f36100">Description</th>
                                <th style="color:#f36100">Posted By</th>
                                
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
                                        <a href="/plans/{{ $info['id'] }}/edit">{{ $info['name'] }}</a>
                                    </td>
                                    <td>{{ $info['duration'] }}</td>
                                    <td>{{ $info['fees'] }}</td>
                                    <td>{{ $info['discount']?$info['discount'].'%':'-' }}</td>
                                    <td>{{ $info['fees']-($info['fees']*$info['discount']/100) }}</td>
                                    <td>{{ $info['description'] }}
                                    </td>
                                    <td>{{ $info['user']->name }}
                                    </td>
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
@endsection
