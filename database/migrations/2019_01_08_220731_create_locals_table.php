<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 80)->nullable();
      			$table->string('distrito', 60)->nullable();
      			$table->string('direccion', 200)->nullable();
      			$table->string('telefono', 45)->nullable();
            $table->string('latitud', 100)->nullable();
            $table->string('longitud', 100)->nullable();
      			$table->string('iframe', 200)->nullable();
      			$table->boolean('orden')->default(1);
      			$table->boolean('estado')->default(1);
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
        Schema::dropIfExists('locals');
    }
}
