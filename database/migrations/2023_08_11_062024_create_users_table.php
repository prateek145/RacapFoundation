<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('bname')->nullable();
            $table->string('sector')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->longtext('image')->nullable();
            $table->string('website')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('specific_id')->nullable();
            $table->string('country_code')->nullable();
            $table->string('role')->nullable();
            $table->string('otp')->nullable();
            $table->string('password')->nullable();
            $table->string('phone')->unique()->nullabe();
            $table->enum('show_business', ['off', 'on']);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('active', ['Y', 'N'])->default('N');
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
};