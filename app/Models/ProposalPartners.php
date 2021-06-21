<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalPartners extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'proposal_id',
        'partner_name'
    ];

    public function partner()
    {
        return $this->hasMany(Partner::class);
    }

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}
