<?php

namespace App\Models;

use App\Models\Wallet;
use App\Models\Receive;
use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Credit extends Model
{
    use HasFactory;

    protected $fillable = [
        'receive_id',
        'payment_method_id',
        'wallet_id',
        'pay_date',
        'value'
    ];


    public function receive()
    {
        $this->belongsTo(Receive::class);
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
