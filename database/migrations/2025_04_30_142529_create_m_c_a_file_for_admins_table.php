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
        Schema::create('m_c_a_file_for_admins', function (Blueprint $table) {
            $table->id();
            $table->longText('vs_file_id')->nullable();
            $table->longText('file_id')->nullable();
            $table->longText('batch_id')->nullable();
            $table->string('status')->nullable();
            $table->longText('company')->nullable();
            $table->longText('owner_name')->nullable();
            $table->longText('business_info')->nullable();
            $table->longText('owner_info')->nullable();
            $table->longText('bs_summary')->nullable();
            $table->longText('od_summary')->nullable();
            $table->longText('cr_analysis')->nullable();
            $table->longText('rfad_check')->nullable();
            $table->longText('ga_criteria')->nullable();
            $table->longText('mr_assessment')->nullable();
            $table->longText('affordability_calculation')->nullable();
            $table->longText('dml_recommendation')->nullable();
            $table->longText('final_decision_summary')->nullable();
            $table->longText('file_info')->nullable();
            $table->tinyInteger('is_regenerating')->default(0);
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
        Schema::dropIfExists('m_c_a_file_for_admins');
    }
};
