<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'Fantasy_name',
        'type',
        'cnpj',
        'address',
        'user_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
