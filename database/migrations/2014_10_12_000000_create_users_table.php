<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('first_name')->nullable();
            $table->string('address')->nullable();
            $table->string('sex')->nullable();
            $table->enum('userable_type', ["App\\\BasicAccount", "App\\\AdminAccount", "App\\\BusinessAccount", "App\\\PartnerAccount"])->default("App\\\BasicAccount");
            $table->unsignedBigInteger('userable_id')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('cni_number')->nullable();
            $table->string('cni_img')->nullable();
            $table->string('birth_certificate_img')->nullable();
            $table->string('language')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('locality_id')->nullable();
            $table->string('place_of_residence')->nullable();
            $table->string('highest_academic_level')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('phone_2')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('pin')->nullable()->unique();
            $table->string('code')->nullable()->unique();
            $table->string('qr_code')->nullable()->unique();
            $table->string('rfid_code')->nullable()->unique();
            $table->string('api_token', 80)->nullable()->default(null);
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('locality_id')->references('id')->on('localities')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
