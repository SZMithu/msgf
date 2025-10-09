<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSetting extends Model
{
    use HasFactory;
    protected $table="settings";
    const USER_NAME = '$name';
    const USER_LINK = '$link';


    protected $fillable = [
        'form_1',
        'form_2',
        'setting',
        'phone',
        'terms',
        'policy',
        'status',
        'logo',
        'updated_at',
        'created_at',
        'email',
        'cc_email',
        'phone_terms',
        'authorised',
        'thanks_title',
        'congrats_title',
        'email_text',
        'thanks_text',
        'enableterms',
        'thanks_bad',
    ];


}

