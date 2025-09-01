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
        Schema::table('boards', function (Blueprint $table) {
            $table->string('password')->comment('비밀번호')->nullable()->after('name');
            $table->text('comment')->comment('답변')->nullable()->after('content');
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('boards', function (Blueprint $table) {
            $table->dropColumn(['password', 'comment']);
            $table->unsignedInteger('user_id')->comment('사용자ID');
        });
    }
};
