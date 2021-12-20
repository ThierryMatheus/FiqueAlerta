<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'comment',
        'claim_date',
        'latitude',
        'longitude',
        'user_id' 
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_complaint', 'complaint_id','categories_id')->using(Category_Complaint::class);
    }

}