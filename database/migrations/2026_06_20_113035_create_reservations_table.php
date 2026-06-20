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
            $table->string('full_name');
            $table->string('phone');
            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->unsignedTinyInteger('guests');
            $table->string('occasion')->nullable();
            $table->longText('special_request')->nullable();
            $table->enum('status',[
                'Pending',
                'Confirmed',
                'Completed',
                'Cancelled'
            ])->default('Pending');

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
