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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('title')->nullable();
            $table->string('link')->nullable();
            $table->text('about')->nullable();
            $table->text('youtube_link')->nullable();
            $table->text('required_documents')->nullable();
            $table->text('standard')->nullable();
            $table->text('registration_process')->nullable();
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
        Schema::dropIfExists('services');
    }
};