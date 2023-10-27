<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStallTypesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('stall_types', function (Blueprint $table) {
            $table->id();
            $table->string('stall_name')->unique();
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
        
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('stall_types');
    }
}
