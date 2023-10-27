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
        Schema::create('citations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_info_id');
            $table->unsignedBigInteger('violation_id');
            $table->unsignedBigInteger('stall_type_id');
            $table->unsignedBigInteger('stall_number_id');
            $table->date('start_date');
            


            $table->foreign('client_info_id')->references('id')->on('client_info');
            $table->foreign('violation_id')->references('id')->on('violations');
            $table->foreign('stall_number_id')->references('id')->on('stall_numbers');
            $table->foreign('stall_type_id')->references('id')->on('stall_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citations');
    }
}

;
