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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('booking_date')->comment('예약일자');
            $table->unsignedTinyInteger('number_adult')->default(0)->comment('어른');
            $table->unsignedTinyInteger('number_teenager')->default(0)->comment('청소년');
            $table->unsignedTinyInteger('number_child')->default(0)->comment('청소년');
            $table->string('name', 64)->comment('예약자명');
            $table->string('contact', 32)->comment('연락처');
            $table->string('email', 64)->comment('이메일');
            $table->boolean('active')->default(false)->comment('예약확정');
            $table->text('memo')->nullable()->comment('메모');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
