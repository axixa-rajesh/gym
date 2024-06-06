<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'duration',
        'user_id',
        'fees',
        'discount',
        'description'

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
