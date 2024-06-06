<style>
    input,
    textarea {
        background-color: #111 !important;
    }
</style>
{{-- {{$trainer_info}} --}}
<input type="hidden" name="trainer_name" value="{{ $trainer_info['name'] }}">
{{-- <div class="mb-3">
    <label for="duration">Duration In Month :</label>
    <input type="number" name="duration" id="duration" class="form-control"  value="{{ $trainer_info['duration'] }}"
        placeholder="Enter Duration In Months" min="1" title="Enter Valid Month">
    @error('duration')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div> --}}



<div class="mb-3">
    <label for="feessubmited"> Fees To Be Submitted In Rupees :</label>
    <input type="number" name="feessubmited" id="feessubmited" class="form-control" min="0" autofocus
       value="{{ $trainer_info['fees'] }}" max="{{$trainer_info['fees']}}"  placeholder="Enter Fees Submitted  In Rupees" title="Enter Valid Fees Submitted"
       >
        @error('feessubmited')
        <span class="text-danger">{{ $message }}</span>
        @enderror
</div>
<div class="mb-3">
    <label for="dos">Date Of Start:</label>
    <input type="date" name="dos" id="dos"  class="form-control"
       placeholder="Enter Date of start" max="{{ date('Y-m-d', time()) }}">
</div>

<div class="mb-3">
    <label for="dos">Trainer Duration Expire Date:</label>
    <input type="date" name="trainerdurationdate"  id="trainerdurationdate" class="form-control">
</div>
<div class="mb-3">
    <label for="paymentmode">Payment Mode: </label>
    <select name="paymentmode" id="paymentmode" class="form-select text-white  bg-transparent "
        style="border:1px solid #555 !important;">
        <option class="text-black">Cash</option>
        <option class="text-black">Online</option>
    </select>

</div>
<div class="mb-3">
    <label for="remark">Remark:</label>
    <textarea name="remark" id="remark" class="form-control" placeholder="Enter Remark" rows="4">{{ old('remark') }}</textarea>
    Hint:<span class="text-muted"> If payment is online write UPI id and transaction id and App Name(Like: Phone pay,
        PAYTM or any. You can also some note here </span>
</div>

