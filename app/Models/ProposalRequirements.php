<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalRequirements extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposal_CRP',
        'proposal_LIB',
        'proposal_CVP',
        'proposal_SDRPM',
        'proposal_CERT',
        'proposal_WP'
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}
