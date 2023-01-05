<?php

namespace App\Models;

use App\Models\Receive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Revenue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function receives()
    {
        $this->hasMany(Receive::class);
    }
}
