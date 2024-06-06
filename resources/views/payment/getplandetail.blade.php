<style>
    input,
    textarea {
        background-color: #111 !important;
    }
</style>
<input type="hidden" name="plan_name" value="{{ $plan_info['name'] }}">
<div class="mb-3">
    <label for="duration">Duration In Month :</label>
    <input type="number" name="duration" id="duration" class="form-control" readonly value="{{ $plan_info['duration'] }}"
        placeholder="Enter Duration In Months" min="1" title="Enter Valid Month">
    @error('duration')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="fees">Fees In Rupees :</label>
    <input type="number" name="plan_fees" id="fees" class="form-control" readonly value="{{ $plan_info['fees'] }}"
        placeholder="Enter Fees In Rupees" title="Enter Valid Fees">
    @error('fees')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label for="plan_discount">Discount In %:</label>
    <input type="number" readonly name="plan_discount" id="plan_discount" class="form-control"
        value="{{ $plan_info['discount'] }}" placeholder="Enter Discounts" title="Enter Valid Discount">
    @error('plan_discount')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label>After Discount Fees In Rupees :</label>
    <input type="text" class="form-control" id="afterdiscountprice" readonly
        value="{{ $plan_info['fees'] - ($plan_info['fees'] * $plan_info['discount']) / 100 }}">
</div>
<div class="mb-3">
    <label for="extradiscount">Extra Discount In %:</label>
    <input type="text" name="extradiscount" id="extradiscount" class="form-control" max="100" min="0"
        onkeyup="changeFees('edd')" onchange="changeFees('edd')" placeholder="Enter Extra Discounts"
        title="Enter Valid Extra Discount">
    @error('extradiscount')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label for="feessubmited">Final Fees To Be Submitted In Rupees :</label>
    <input type="text" name="feessubmited" id="feessubmited" class="form-control" min="0" autofocus
        max="{{ $plan_info['fees'] - ($plan_info['fees'] * $plan_info['discount']) / 100 }}"
        value="{{ $plan_info['fees'] - ($plan_info['fees'] * $plan_info['discount']) / 100 }}"
        placeholder="Enter Fees Submitted  In Rupees" title="Enter Valid Fees Submitted" onkeyup="changeFees('fss')"
        onchange="changeFees('fss')">
    @error('feessubmited')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="dos">Date Of Fees Submit:</label>
    <input type="date" name="dos" id="dos" value="{{ date('Y-m-d', time()) }}" class="form-control"
        onchange="planexp()" placeholder="Enter Date of Submit" max="{{ date('Y-m-d', time()) }}">
</div>

<div class="mb-3">
    <label for="dos">Plan Expire Date:</label>
    <input type="date" name="planexpiredate" readonly id="planexpiredate" class="form-control">
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
        PAYTM or any). You can also some note here </span>
</div>
<script>
    $(document).ready(function() {
        planexp();
        mainbtn.disabled = false;
    })

    function planexp() {
        const dateString = dos.value;
        const date = new Date(Date.parse(dateString));
        const nextdate = new Date(date.setMonth(date.getMonth() + parseInt(duration.value))).toISOString().split('T')[
            0];
        planexpiredate.value = nextdate;
    }

    function changeFees(ts) {
        let adp = afterdiscountprice;
        let fs = feessubmited;
        let ed = extradiscount;
        if (ts == 'edd') {
            if (ed.value >= 0 && ed.value <= 100)
                fs.value = adp.value - (adp.value * ed.value / 100);
            else {
                ed.value = 0;
                alert("OOPS! Invalid Discount");
            }
        } else {
            if (adp.value != fs.value) {
                if (Number(fs.value) >= 0 && Number(fs.value) <= Number(adp.value)) {

                    ed.value = ((adp.value - fs.value) / adp.value * 100).toFixed(2);

                } else {
                    if (Number(adp.value) < Number(fs.value)) {
                        alert("You can't take extra fees from the plan fees");
                    } else {
                        alert("OOPS! Invalid Amount");
                    }

                    fs.value = adp.value;
                    ed.value = 0;

                }
            }
        }
    }
</script>
