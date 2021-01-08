<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsmakersTable extends Migration
{
    public function up()
    {
        Schema::create('newsmakers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('remark');


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('newsmakers');
    }
}
