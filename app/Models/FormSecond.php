<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSecond extends Model
{
    use HasFactory;

    protected $fillable = [
        'u_id',
        'company_name',
        'dba',
        'fedral_taxid',
        'purpose',
        'industry_des',
        'bussiness_phone',
        'fax',
        'bussines_startDate',
        'Street',
        'city',
        'state',
        'postal',
        'country',
        'title',
        'firstname',
        'lastname',
        'phone',
        'email',
        'ssn',
        'dob',
        'ownership',
        'Street2',
        'city2',
        'state2',
        'postal2',
        'country2',
        'loan_type',
        'location_ownership',
        'owned_details',
        'gross_sales',
        'avg_bank_balance',
        'requested_amount',
        'term_length',
        'bank_statement',
        'digital_signature',
        'owner_title',
        'extra_phone',
    ];
}

