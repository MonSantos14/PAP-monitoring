<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'office_name',
        'firstname',
        'middlename',
        'lastname',
        'campus',
        'email',
        'password',
        'user_type',
        'user_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime', 
    ];

    public function createProposal() {
        return $this->hasMany(Proposal::class);
    }

    public function createFaculty() {
        return $this->hasMany(Faculty::class);
    }

    public function partners() {
        return $this->hasMany(Partner::class);
    }
}   
