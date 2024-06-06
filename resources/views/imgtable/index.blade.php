@extends('layouts.app')
@section('bread')
    <div class="breadcrumb-text">
        <h2>View Image</h2>
        <div class="bt-option">
            <a href="/">Image</a>
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

                        <span style="color:#f36100">View Image</span>
                    </div>
                </div>

                <div class="card-body leave-comment" style="color:#f36100">
                                        <div class="mb-3">
                        <a href="/myimages/create" class="btn btn-primary">Upload New Image</a>
                    </div>
                    <table class="table table-striped table-dark table-responsive ">
                        <thead>
                            <tr>
                                <th style="color:#f36100">S.No.</th>
                                <th style="color:#f36100">Title</th>
                                <th style="color:#f36100">Image</th>
                                <th style="color:#f36100">Description</th>
                                <th style="color:#f36100">Header Image</th>
                                <th style="color:#f36100">Background Image</th>
                                <th style="color:#f36100">Action</th>
                                

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $info)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                      {{ $info['title'] }}
                                    </td>
                                    <td><img src="/images/{{ $info['image'] }}" height="100px"></td>
                                    <td>{{ $info['description'] }}</td>
                                    <td>
                                        @if ($info['headerimage'] == 'yes')
                                            <b style="color:green">Yes</b>
                                        @else
                                            <b style="color:red">No</b>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($info['backgroundimage'] == 'yes')
                                            <b style="color:green">Yes</b>
                                        @else
                                            <b style="color:red">No</b>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="/myimages/{{$info['id']}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">&nbsp; Delete&nbsp; </button>
                                        </form>
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
