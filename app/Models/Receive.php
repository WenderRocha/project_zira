<?php

namespace App\Models;

use App\Models\Credit;
use App\Models\Revenue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receive extends Model
{
    use HasFactory;

    protected $fillable = [
        'revenue_id',
        'due_date',
        'history',
        'value',
        'paid',
    ];


    public function revenue()
    {
        $this->belongsTo(Revenue::class);
    }

    public function credits()
    {
        $this->hasMany(Credit::class);
    }
}
