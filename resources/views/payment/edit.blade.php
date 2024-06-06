@extends('layouts.app')
@section('bread')
    <div class="breadcrumb-text">
        <h2>Edit Plan</h2>
        <div class="bt-option">
            <a href="/">Plan</a>
            <span>{{ $info->name }}</span>
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

                        <span style="color:#f36100">Edit Plan</span>
                    </div>
                </div>

                <div class="card-body leave-comment" style="color:#f36100">
                    <form method="POST" action="/plans/{{ $info['id'] }}">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="name">Name Of Plan (<span class="text-danger">*</span>):</label>
                            <input type="text" name="name" id="name" class="form-control" required
                                pattern="[A-z 0-9-_]{2,40}" placeholder="Enter Name" title="Enter valid name"
                                value="{{ old('name') ?? $info['name'] }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="duration">Duration In Month (<span class="text-danger">*</span>):</label>
                            <input type="number" name="duration" id="duration" class="form-control" required
                                value="{{ old('duration') ?? '1' }}" placeholder="Enter Duration In Months" min="1"
                                title="Enter Valid Month">
                            @error('duration')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="fees">Fees In Rupees (<span class="text-danger">*</span>):</label>
                            <input type="number" name="fees" id="fees" class="form-control" required
                                value="{{ old('fees') }}" placeholder="Enter Fees In Rupees" title="Enter Valid Fees">
                            @error('fees')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="discount">Discount In %:</label>
                            <input type="number" name="discount" id="discount" class="form-control"
                                value="{{ old('discount') }}" placeholder="Enter Discounts" title="Enter Valid Discount">
                            @error('discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Enter Description" rows="4">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status">User Status: </label>
                            <select name="status" id="status" class="form-select text-white  bg-transparent "
                                style="border:1px solid #555 !important;">
                                <option value="Activate" class="text-black">Activate</option>
                                <option value="Deactivate" class="text-black"
                                    {{ old('status') == 'Deactivate' ? 'selected' : '' }}>
                                    Deactivate</option>
                            </select>

                        </div>
                        <div class="mb-3 text-center">
                            <button class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
