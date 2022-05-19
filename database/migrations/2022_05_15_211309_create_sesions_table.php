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
        Schema::create('sesions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('weight')->nullable();
            $table->integer('repetition')->nullable();
            $table->integer('time')->nullable();
            $table->date('day');
            $table->string('start_time');
            $table->string('finish_time')->nullable();
            $table->longText('remark')->nullable();
            $table->unsignedBigInteger('id_client');
            $table->timestamps();

            $table->foreign('id_client')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sesions');
    }
};
