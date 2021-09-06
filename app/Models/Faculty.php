<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_id',
        'faculty_firstname',
        'faculty_middlename',
        'faculty_lastname',
        'faculty_fullname',
        'faculty_college',
        'faculty_email',
        'faculty_image',
        'faculty_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proposalmember()
    {
        return $this->belongsTo(ProposalMember::class);
    }
}
