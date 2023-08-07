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
        Schema::create('impacts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('no')->nullable();

            $table->string('name1')->nullable();
            $table->string('no1')->nullable();

            $table->string('name2')->nullable();
            $table->string('no2')->nullable();

            $table->string('name3')->nullable();
            $table->string('no3')->nullable();
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
        Schema::dropIfExists('impacts');
    }
};