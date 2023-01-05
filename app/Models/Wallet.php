<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'initial_balance',
        'balance',
        'profit',
        'take_profit',
        'take_percentage',
        'stop_loss',
        'stop_percentage',
        'currency',
        'management_type',
        'add_totals',
        'is_binary',
        'is_main'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
