<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'amt',
        'purpose',
        'average',
        'time',
        'b_name',
        'ein',
        'business_type',
        'state',
        'business_industry',
        'f_name',
        'l_name',
        'email',
        'phone',
        'credit_score',
        'token',
        'server',
        'referral',
        'lead_type',
    ];
}

