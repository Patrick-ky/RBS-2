<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('client_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('stall_type_id'); 
            $table->unsignedBigInteger('stall_number_id');
            $table->date('start_date'); 
            $table->date('due_date');  
            
          
            $table->foreign('client_id')->references('id')->on('clients');            
            $table->foreign('stall_type_id')->references('id')->on('stall_types');
            $table->foreign('stall_number_id')->references('id')->on('stall_numbers');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('client_info');
    }
};

// $table->decimal('ownerMonthly',9,2);

