<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChanEndorsement extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposal_id',
        'proposal_endorsement',
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}
