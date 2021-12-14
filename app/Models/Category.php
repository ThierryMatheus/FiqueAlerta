<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function complaints(){
        return $this->belongsToMany(Complaint::class, 'categories_complaint', 'categories_id','complaint_id');
    }
}
