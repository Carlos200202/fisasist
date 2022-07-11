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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')
                ->references('id')
                ->on('pacientes');
            $table->unsignedBigInteger('fisioterapeuta_id');
            $table->foreign('fisioterapeuta_id')
                ->references('id')
                ->on('fisioterapeutas');
            $table->text("description");
            $table->string("flag_img");
            $table->string("resourceId");
            $table->dateTime("start");
            $table->dateTime("end");
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
        Schema::dropIfExists('citas');
    }
};
