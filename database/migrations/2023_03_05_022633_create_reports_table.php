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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index('fk_reports_to_users');
            $table->foreignId('report_category_id')->nullable()->index('fk_reports_to_report_categories');
            $table->string('title_report');
            $table->longText('body_report');
            $table->date('incident_date');
            $table->longText('location_incident');
            $table->longText('report_image')->nullable();
            $table->enum('status', ['pending', 'ditolak', 'proses', 'selesai'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
