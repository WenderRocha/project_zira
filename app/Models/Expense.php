<?php

namespace App\Models;

use App\Models\Debit;
use App\Models\Payable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function payables()
    {
        $this->hasMany(Payable::class);
    }

}
