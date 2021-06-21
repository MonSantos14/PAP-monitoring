<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_image',
        'partner_email',
        'partner_number',
        'partner_expiration',
        'partner_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function proposalpartner()
    {
        return $this->belongsTo(ProposalPartners::class);
    }
}
