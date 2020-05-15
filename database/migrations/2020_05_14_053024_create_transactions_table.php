<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id')->nullable();
            $table->string('transaction_code')->nullable()->unique();
            $table->enum('type', ['Pay in', 'Pay out'])->default('Pay in');
            $table->decimal('amount', 18, 2)->nullable();
            $table->decimal('post_balance', 18, 2)->nullable();
            $table->string('iso_4217_currency_code')->nullable();
            $table->string('description')->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
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
        Schema::dropIfExists('transactions');
    }
}
