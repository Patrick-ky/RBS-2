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
        Schema::create('violations', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('violation_name', 255); 
            $table->decimal('penalty_value');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('stall_number_id')->nullable();
            $table->timestamps();

            // ang mga foreign key constraints
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
            $table->foreign('stall_number_id')->references('id')->on('stall_numbers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violations');
    }
};
