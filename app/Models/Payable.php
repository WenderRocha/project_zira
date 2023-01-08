<?php

namespace App\Models;

use App\Models\User;
use App\Models\Debit;
use App\Models\Expense;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payable extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'expenses_id',
        'due_date',
        'history',
        'value',
        'paid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function expense()
    {
        $this->belongsTo(Expense::class);
    }

    public function debits()
    {
        $this->hasMany(Debit::class);
    }
}
