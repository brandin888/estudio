<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 80)->nullable();
      			$table->string('email', 40)->nullable();
      			$table->string('asunto', 200)->nullable();
      			$table->text('mensaje')->nullable();
      			$table->string('telefono', 50)->nullable();
      			$table->smallInteger('orden')->default(1);
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
        Schema::dropIfExists('contacts');
    }
}
