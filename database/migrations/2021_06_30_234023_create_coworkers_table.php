<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoworkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coworkers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('linkedin');
            $table->string('instagram');
            $table->string('rol');
            $table->rememberToken();    
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
        Schema::dropIfExists('coworkers');
    }
}
