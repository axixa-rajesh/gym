@extends('layouts.app')
@section('bread')
    <div class="breadcrumb-text">
        <h2>Payment</h2>
        <div class="bt-option">
            <a href="/">Fess</a>
            <span>{{ $member_info->name }}</span>
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

                        <span style="color:#f36100">Select Plan</span>
                    </div>
                </div>

                <div class="card-body leave-comment" style="color:#f36100">
                    <form method="POST" action="/payment/">
                        @csrf
                        <input type="hidden" name="member_id" value="{{ $member_info->id }}">
                        <div class="mb-3">
                            <label for="">Name Of Member (<span class="text-danger">*</span>):</label>
                            <input type="text" name="member_name" value="{{ $member_info['name'] }}" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="">Member Mobile :</label>
                            <input type="text" value="{{ $member_info['mobile'] }}" readonly>
                        </div>
                        
                        <div class="mb-3">
                            <label for="plan_id">Select Plan (<span class="text-danger">*</span>):</label>
                            <select name="plan_id" id="plan_id" class="form-select text-white  bg-transparent "
                            onchange="loadplan(this.value)" required style="border:1px solid #555 !important;">
                            <option value="" class="text-black">Select One</option>
                                @foreach ($plan_data as $plan_info)
                                    <option value="{{ $plan_info['id'] }}" class="text-black">{{ $plan_info['name']." (". $plan_info['duration'] ." month)" }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div id="planresult"></div>

                      

                        <div class="mb-3 text-center">
                            <button class="btn btn-warning" id="mainbtn" disabled onclick="return confirm('Do you really want to make this payment. After submit you can not make change.')">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     loadplan(plan_id.value);
        // });
        function loadplan(plan_id) {
            // alert(plan_id);
            $.ajax({
                type: "get",
                url: "/getplandetail/" + plan_id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(r) {
                    $('#planresult').html(r);
                    feessubmited.focus();
                },
                error: function(e) {
                    alert("Something went worng");
                }
            });
        }
    </script>
@endsection
