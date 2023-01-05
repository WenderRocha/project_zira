<?php

namespace App\Models;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Debit extends Model
{
    use HasFactory;

    protected $fillable = [
        'payable_id',
        'payment_method_id',
        'wallet_id',
        'pay_date',
        'value'
    ];

    public function expense()
    {
        $this->belongsTo(Expense::class);
    }

    public function paymentMethod()
    {
        $this->belongsTo(PaymentMethod::class);
    }

    public function wallet()
    {
        $this->belongsTo(Wallet::class);
    }
}
