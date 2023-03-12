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
        Schema::table('reports', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_reports_to_users')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('report_category_id', 'fk_reports_to_report_categories')->references('id')->on('report_categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropForeign('fk_reports_to_users');
            $table->dropForeign('fk_reports_to_report_categories');
        });
    }
};
