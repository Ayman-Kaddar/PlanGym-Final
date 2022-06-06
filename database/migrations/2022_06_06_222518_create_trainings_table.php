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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_session');
            $table->unsignedBigInteger('id_name_training');
            $table->integer('weight')->nullable();
            $table->integer('repetition')->nullable();
            $table->integer('time')->nullable();
            $table->date('day');
            $table->string('start_time');
            $table->string('finish_time')->nullable();
            $table->longText('remark')->nullable();
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
        Schema::dropIfExists('trainings');
    }
};
