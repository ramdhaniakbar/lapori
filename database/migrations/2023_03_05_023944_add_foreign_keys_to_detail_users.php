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
        Schema::table('detail_users', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_detail_users_to_users')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('type_user_id', 'fk_detail_users_to_type_users')->references('id')->on('type_users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_users', function (Blueprint $table) {
            $table->dropForeign('fk_detail_users_to_users');
            $table->dropForeign('fk_detail_users_to_type_users');
        });
    }
};
