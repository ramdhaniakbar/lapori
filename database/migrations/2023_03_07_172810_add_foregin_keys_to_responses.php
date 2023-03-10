<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('responses', function (Blueprint $table) {
            $table->foreign('employee_id', 'fk_responses_to_employees')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('report_id', 'fk_responses_to_reports')->references('id')->on('reports')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('responses', function (Blueprint $table) {
            $table->dropForeign('fk_responses_to_employees');
            $table->dropForeign('fk_responses_to_reports');
        });
    }
};
