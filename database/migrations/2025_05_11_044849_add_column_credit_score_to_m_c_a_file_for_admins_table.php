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
        Schema::table('m_c_a_file_for_admins', function (Blueprint $table) {
            $table->string('credit_score')->nullable()->after('owner_info');
            $table->string('business_type')->nullable()->after('credit_score');
            $table->string('approved_amount')->nullable()->after('ga_criteria');
            $table->string('approval_risk')->nullable()->after('approved_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_c_a_file_for_admins', function (Blueprint $table) {
            $table->dropColumn('credit_score', 'business_type', 'approved_amount', 'approval_risk');
        });
    }
};
