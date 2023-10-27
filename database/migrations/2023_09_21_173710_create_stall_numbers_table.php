<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStallNumbersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('stall_numbers', function (Blueprint $table) {
            $table->id(); 
            $table->integer('stall_number');
            $table->unsignedBigInteger('stall_type_id');
            $table->string('nameforstallnumber');
            $table->string('description');
            $table->enum('status', ['available', 'occupied'])->default('available');
            $table->timestamps();



            $table->foreign('stall_type_id')->references('id')->on('stall_types');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('stall_numbers');
    }
}

