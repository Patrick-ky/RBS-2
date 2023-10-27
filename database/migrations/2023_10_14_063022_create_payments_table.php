<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_info_id');
            $table->string('payment_for'); // 'monthly_rent' or 'violation'
            $table->decimal('amount', 9, 2);
            $table->enum('status', ['unpaid', 'paid_violation', 'paid_monthly_rent', 'paid_in_full']);
            $table->timestamps();

            $table->foreign('client_info_id')->references('id')->on('client_info');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
