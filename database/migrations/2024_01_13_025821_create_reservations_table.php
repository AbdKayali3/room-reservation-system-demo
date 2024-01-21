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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            // user data
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();

            // building and room
            $table->foreignId('building_id')->constrained()->cascadeOnDelete();
            $table->foreignId('room_id')->constrained()->cascadeOnDelete();

            // date from and to
            $table->date('start_date');
            $table->date('end_date');

            // duration
            $table->integer('duration'); // days

            // duration price
            $table->double('duration_price');

            // total price
            $table->double('total_price');


            $table->integer('status')->default(0); // 0: pending, 1: confirmed, 2: canceled




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
