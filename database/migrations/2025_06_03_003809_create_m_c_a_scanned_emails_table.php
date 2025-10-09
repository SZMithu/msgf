<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_c_a_scanned_emails', function (Blueprint $table) {
            $table->id();
            $table->string('batch_id');
            $table->string('email_id');
            $table->mediumText('subject');
            $table->longText('body');
            $table->string('sender');
            $table->string('attachments_count')->nullable();
            $table->string('report_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_c_a_scanned_emails');
    }
};
