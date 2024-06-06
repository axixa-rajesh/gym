<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=['user_id',	'member_id',	'member_name',	'plan_id',	'plan_name',	'duration',	'plan_fees',	'plan_discount',	'extradiscount',	'feessubmited',	'dos',	'planexpiredate',	'paymentmode',	'remark'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
