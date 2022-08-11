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
        Schema::create('fisioterapeutas', function (Blueprint $table) {
            $table->id();
            $table->string('fiste_name', 200);
            $table->string('fiste_document', 15);
            $table->string('fiste_expert', 50);
            $table->date('fiste_birth_date');
            $table->string('fiste_gender', 10);
            $table->string('fiste_hexcolor', 7);
            $table->string('fiste_phone', 10)->nullable();
            $table->string('fiste_cell_phone', 10);
            $table->string('fiste_email', 50);
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
        Schema::dropIfExists('fisioterapeutas');
    }
};