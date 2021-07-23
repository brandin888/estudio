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
            $table->text('description-subtitle');
            $table->text('description-title');
            $table->text('description-text');

            $table->text('vision-text');
            $table->text('mision-text');


            $table->text('ceo-description-subtitle');
            $table->text('ceo-description-title');
            $table->text('ceo-description-text');
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
