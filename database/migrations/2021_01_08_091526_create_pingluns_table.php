<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinglunsTable extends Migration
{
    public function up()
    {
        Schema::create('pingluns', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('news_id');
            $table->string('reply');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pingluns');
    }
}
