<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainerpayment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',    'member_id',    'member_name',    'trainer_id',    'trainer_name',    'duration',         'feessubmited',    'dos',    'trainerdurationdate',    'paymentmode',    'remark'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
