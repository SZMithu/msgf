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
        Schema::create('m_c_a_documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email_id')->nullable();
            $table->string('file_id')->nullable();
            $table->string('batch_id');
            $table->longText('file_text')->nullable();
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
        Schema::dropIfExists('m_c_a_documents');
    }
};
