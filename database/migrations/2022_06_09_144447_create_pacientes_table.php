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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('pat_firstname', 50);
            $table->string('pat_secondname', 50)->nullable();
            $table->string('pat_lastname', 50);
            $table->string('pat_second_lastname', 50)->nullable();
            $table->string('pat_document', 15);
            $table->string('pat_gender', 10);
            $table->date('pat_birth_date');
            $table->string('pat_location', 150);
            $table->unsignedBigInteger('pat_entity_id');
            $table->foreign('pat_entity_id')
                ->references('id')
                ->on('entidades');
            $table->string('pat_number_policy', 50);
            $table->string('pat_phone', 10)->nullable();
            $table->string('pat_cell_phone', 10);
            $table->string('pat_email', 50);
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
        Schema::dropIfExists('pacientes');
    }
};
