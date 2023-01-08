<?php

namespace App\Models;

use App\Models\User;
use App\Models\Receive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Revenue extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function receives()
    {
        $this->hasMany(Receive::class);
    }
}
