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
        Schema::create('m_c_a_report_for_admins', function (Blueprint $table) {
            $table->id();
            $table->string('m_c_a_assistant_id')->nullable();
            $table->string('message_id')->nullable();
            $table->longText('response')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('m_c_a_report_for_admins');
    }
};
