<?php

namespace App\Models;

use App\Http\Controllers\TrainerpaymentController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'user_id',
        'mobile',
        'dob',
        'gender',
        'address',
        'height',
        'weight',
        'doj',
        'status'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function trainerpayments()
    {
        return $this->hasMany(Trainerpayment::class);
    }

}
