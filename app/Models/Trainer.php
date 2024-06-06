<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'user_id',
        'details',
        'status',
        'mobile',
        'doj',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
