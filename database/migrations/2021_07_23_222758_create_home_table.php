<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('feature-title1');
            $table->text('feature-text1');
            $table->text('feature-title2');
            $table->text('feature-text2');
            $table->text('feature-title3');
            $table->text('feature-text3');
            $table->text('description-subtitle');
            $table->text('description-title');
            $table->text('description-text');
            $table->string('video')->nullable();

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
        Schema::dropIfExists('home');
    }
}
