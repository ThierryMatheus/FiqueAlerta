<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'fantasy_name',
        'type',
        'cnpj',
        'cpf',
        'address',
        'cellphone',
        'birthdate',
        'userType'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function is_company()
    {
        return $this->userType == 1;
    }

    public function has_company_profile()
    {
        return $this->company_profile !== null;
    }

    public function company_profile()
    {
        return $this->hasOne(company_profile::class);
    }

    public function user_profile()
    {
        return $this->hasOne(user_profile::class);
    }

    public function complaint()
    {
        return $this->hasMany(Complaint::class);
    }

}
