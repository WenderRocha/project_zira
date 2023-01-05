<?php

namespace App\Models;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payable extends Model
{
    use HasFactory;

    public function expense()
    {
        $this->belongsTo(Expense::class);
    }
}
