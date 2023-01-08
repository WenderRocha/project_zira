<?php

namespace App\Models;

use App\Models\User;
use App\Models\Credit;
use App\Models\Revenue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receive extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'revenue_id',
        'due_date',
        'history',
        'value',
        'paid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function revenue()
    {
        $this->belongsTo(Revenue::class);
    }

    public function credits()
    {
        $this->hasMany(Credit::class);
    }
}
