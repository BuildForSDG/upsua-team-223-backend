<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_costs', function (Blueprint $table) {
            $table->id();
			$table->decimal('min_val', 18, 2)->nullable();
            $table->decimal('max_val', 18, 2)->nullable();
            $table->decimal('amount', 18, 2)->nullable();
            $table->unsignedBigInteger('finance_id')->nullable();
            $table->foreign('finance_id')->references('id')->on('finances')->onDelete('cascade');
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
        Schema::dropIfExists('finance_costs');
    }
}
