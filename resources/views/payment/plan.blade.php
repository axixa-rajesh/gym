@extends('layouts.app')
@section('bread')
    <div class="breadcrumb-text">
        <h2>Members Plan</h2>
        <div class="bt-option">
            <a href="/">Member</a>
            <span>Plan</span>
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
                <div class="card bg-transparent">

                    <div class="card-header text-center">

                        <span style="color:#f36100">Memebers Plan</span>
                    </div>
                </div>

                <div class="card-body leave-comment" style="color:#f36100">
                    <form method="POST" action="/members/">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Name (<span class="text-danger">*</span>):</label>
                            <input type="text" name="name" id="name" class="form-control" required pattern="[A-z ]{2,40}"
                                placeholder="Enter Name" title="Enter valid name" value="{{old('name')}}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="mobile">Mobile (<span class="text-danger">*</span>):</label>
                            <input type="text" name="mobile" id="mobile" class="form-control" required  value="{{old('mobile')}}"
                                placeholder="Enter Mobile" pattern="[6-9]{1}[0-9]{9}"
                                title="Enter Valid 10 Digit Mobile Number">
                            @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="dob">Date Of Birth:</label>
                            <input type="date" name="dob" id="dob"  value="{{old('dob')}}" class="form-control"
                                placeholder="Enter Date of Birth" max="{{ date('Y-m-d', time() - 86400 * 365.25 * 12) }}"
                                min="{{ date('Y-m-d', time() - 86400 * 365.25 * 80) }}">
                        </div>
                        <div class="mb-3">
                          
                            <label for="gender">Gender: </label>
                            <select name="gender" id="gender" class="form-select text-white  bg-transparent " 
                                style="border:1px solid #555 !important;">
                                <option value="male" class="text-black">Male</option>
                                <option value="female" class="text-black" {{(old('gender')=='female')?"selected":""}} >Female</option>
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="email">Email: </label>
                            <input type="email" name="email" id="email" value="{{old('email')}}"class="form-control"
                                placeholder="Enter Email">
                        </div>
                        <div class="mb-3">
                            <label for="height">Height: </label>
                            <input type="text" name="height" id="height" value="{{old('height')}}" class="form-control"
                                placeholder="Enter Height" pattern="[3-9]{1}(.)[0-9]{1,2}">

                        </div>
                        <div class="mb-3">
                            <label for="weight">Weight: </label>
                            <input type="text" name="weight" id="weight" value="{{old('weight')}}" class="form-control"
                                placeholder="Enter weight" pattern="[0-9]{0,3}\.{0,1}\d{1,3}">
                        </div>
                        <div class="mb-3">
                            <label for="doj">Date Of Joining:</label>
                            <input type="date" value="{{old('doj')}}" name="doj" id="doj" class="form-control"
                                placeholder="Enter Date of Joining" value="{{ date('Y-m-d', time()) }}">
                        </div>
                        <div class="mb-3">
                            <label for="address">Address:</label>
                            <textarea name="address" id="address" class="form-control" placeholder="Enter Address" rows="4">{{old('address')}}</textarea>
                        </div>
                        <div class="mb-3 text-center">
                            <button class="btn btn-warning">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
