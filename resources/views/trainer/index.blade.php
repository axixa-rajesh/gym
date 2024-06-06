
@extends('layouts.app')
@section('bread')
    <div class="breadcrumb-text">
        <h2>Trainer View</h2>
        <div class="bt-option">
            <a href="/">Trainer</a>
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

                        <span style="color:#f36100">Trainers View</span>
                    </div>
                </div>

                <div class="card-body leave-comment" style="color:#f36100">
                                        <div class="mb-3">
                        <a href="/trainers/create" class="btn btn-primary">New Trainer`</a>
                    </div>
                    <table class="table table-striped table-dark table-responsive">
                        <thead>
                            <tr>
                                <th style="color:#f36100">S.No.</th>
                                
                                <th style="color:#f36100">Name</th>
                                <th style="color:#f36100">Mobile</th>
                                <th style="color:#f36100">Details</th>
                                
                                <th style="color:#f36100">Date of Joining</th>
                                <th style="color:#f36100">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $info)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                  
                                    <td title="Edit">
                                        <a href="/trainers/{{ $info['id'] }}/edit">{{ $info['name'] }}</a>
                                    </td>
                                    
                                    <td>{{ $info['mobile'] }}</td>
                                    <td>{{ $info['details'] }}</td>
                                
                                
                                    
                                    <td>{{ date('d- M - y', strtotime($info['doj'])) }}</td>
                                    
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
