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
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('violation_id');
            $table->unsignedBigInteger('stall_number_id');
            $table->unsignedBigInteger('stall_type_id');
            $table->integer('total_balance');

            $table->timestamps();

            
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('violation_id')->references('id')->on('violations');
            $table->foreign('stall_number_id')->references('id')->on('stall_numbers');
            $table->foreign('stall_type_id')->references('id')->on('stall_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};
