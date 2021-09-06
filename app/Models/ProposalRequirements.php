<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalRequirements extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposal_CRP',
        'proposal_CRP_status',
        'proposal_CRP_remarks',
        'proposal_LIB',
        'proposal_LIB_status',
        'proposal_LIB_remarks',
        'proposal_CVP',
        'proposal_CVP_status',
        'proposal_CVP_remarks',
        'proposal_SDRPM',
        'proposal_SDRPM_status',
        'proposal_SDRPM_remarks',
        'proposal_CERT',
        'proposal_CERT_status',
        'proposal_CERT_remarks',
        'proposal_WP',
        'proposal_WP_status',
        'proposal_WP_remarks'
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}
