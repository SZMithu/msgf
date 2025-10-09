<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCAFileForAdmin extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function report()
    {
        return $this->hasOne(MCAReportForAdmin::class, 'm_c_a_assistant_id', 'id');
    }
    public function isFromEmail()
    {
        $this->mcaDocument = MCADocuments::where('batch_id', $this->batch_id)->where('email_id', '!=', null)->first();
        if ($this->mcaDocument) {
            return true;
        } else {
            return false;
        }
    }
}
