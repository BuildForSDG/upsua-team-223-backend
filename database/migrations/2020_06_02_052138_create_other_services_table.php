<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_services', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->integer('number')->unique()->nullable();
            $table->string('description')->nullable();
            $table->string('img')->nullable();
            $table->unsignedBigInteger('partner_account_id')->nullable();
            $table->unsignedBigInteger('locality_id')->nullable();
            $table->foreign('partner_account_id')->references('id')->on('partner_accounts')->onDelete('cascade');
            $table->foreign('locality_id')->references('id')->on('localities')->onDelete('cascade');
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
        Schema::dropIfExists('other_services');
    }
}
