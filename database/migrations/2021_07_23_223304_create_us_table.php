<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('us', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('descsub');
            $table->text('desct');
            $table->text('descrtxt');

            $table->text('vision');
            $table->text('mision');


            $table->text('ceodesc1');
            $table->text('ceodesc2');
            $table->text('ceodesc3');
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
        Schema::dropIfExists('us');
    }
}
