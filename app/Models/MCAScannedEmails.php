<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCAScannedEmails extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function report()
    {
        return $this->hasOne(MCAFileForAdmin::class, 'batch_id', 'batch_id');
    }
}
