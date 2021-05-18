<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposal_title',
        'proposal_duration',
        'proposal_leader',
        'proposal_status'   
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
