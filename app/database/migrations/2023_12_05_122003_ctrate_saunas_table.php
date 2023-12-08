<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CtrateSaunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saunas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', '100');
            $table->string('adress');
            $table->string('closed');
            $table->text('url');
            $table->string('temperature');
            $table->binary('image');
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
        Schema::dropIfExists('saunas');
    }
}
