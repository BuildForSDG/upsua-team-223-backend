<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_accounts', function (Blueprint $table) {
            $table->id();
            $table->boolean('use_pin')->default(true);
            $table->string('pin')->nullable()->default(bcrypt('12345'));
            $table->string('qr_code')->nullable()->unique();
            $table->string('rfid_code')->nullable()->unique();
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
        Schema::dropIfExists('basic_accounts');
    }
}
