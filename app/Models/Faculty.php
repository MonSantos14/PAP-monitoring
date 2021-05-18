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
        'faculty_lastname',
        'faculty_email',
        'faculty_image',
           
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
