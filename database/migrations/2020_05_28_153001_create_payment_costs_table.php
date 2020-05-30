<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_costs', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['in', 'out'])->default('in');
            $table->decimal('min_val', 18, 2)->nullable();
            $table->decimal('max_val', 18, 2)->nullable();
            $table->decimal('amount', 18, 2)->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_costs');
    }
}
