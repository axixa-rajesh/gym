@extends('layouts.app')
@section('bread')
    <div class="breadcrumb-text">
        <h2>Insert Image</h2>
        <div class="bt-option">
            <a href="/">Image</a>
            <span>Insert</span>
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

                        <span style="color:#f36100">Insert Image</span>
                    </div>
                </div>

                <div class="card-body leave-comment" style="color:#f36100">
                    <form method="POST" action="/myimages/" enctype="multipart/form-data">
                        @csrf
                        	
                        <div class="mb-3">
                            <label for="title">Title (<span class="text-danger">*</span>):</label>
                            <input type="text" name="title" id="title" class="form-control" required
                                pattern="[A-z 0-9-_]{2,40}" placeholder="Enter Title" title="Enter valid title"
                                value="{{ old('title') }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                          <div class="mb-3">
                            <label for="image">Image (<span class="text-danger">*</span>):</label>
                            <input type="file" name="image" id="image" class="form-control" required
                                accept="image/*">

                        </div>
                       
                        <div class="mb-3">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Enter Description" rows="4">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="headerimage">Header Image: </label>
                            <select name="headerimage" id="headerimage" class="form-select text-white  bg-transparent "
                                style="border:1px solid #555 !important;">
                                <option value="no" class="text-black">
                                    No</option>
                                    <option value="yes" class="text-black" {{ old('headerimage') == 'yes' ? 'selected' : '' }}>Yes</option>
                            </select>

                        </div> 
                        <div class="mb-3">
                            <label for="backgroundimage">Background Image: </label>
                            <select name="backgroundimage" id="backgroundimage" class="form-select text-white  bg-transparent "
                                style="border:1px solid #555 !important;">
                                <option value="no" class="text-black" >
                                    No</option>
                                    <option value="yes" class="text-black" {{ old('backgroundimage') == 'yes' ? 'selected' : '' }}>Yes</option>
                            </select>

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
