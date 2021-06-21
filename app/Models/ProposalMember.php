<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_id',
        'proposal_id',
        'faculty_fullname',
        'faculty_college'
    ];

    public function faculty()
    {
        return $this->hasMany(Faculty::class);
    }

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}
