<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitacions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('capacidad')->nullable();
            $table->string('ocupante1')->nullable();
            $table->string('ocupante2')->nullable();
            $table->string('ocupante3')->nullable();
            $table->string('ocupante4')->nullable();
            $table->string('planta')->nullable();
            $table->string('camas')->nullable();
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
        Schema::dropIfExists('habitacions');
    }
}
