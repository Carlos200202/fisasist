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
            $table->unsignedBigInteger('medico_id');
            $table->foreign('medico_id')
                ->references('id')
                ->on('medicos');
            $table->string("type_visit");
            $table->string("process");
            $table->string("complexity");
            $table->string("contact_name");
            $table->string("contact_relationship");
            $table->string("contact_cell_phone");
            $table->text("observations");
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
