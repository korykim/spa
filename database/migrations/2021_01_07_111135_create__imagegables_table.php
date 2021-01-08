<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagegablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Imagegables', function (Blueprint $table) {
            $table->id();
            $table->integer('image_id');
            $table->morphs('imagegable');
            $table->index('image_id');
            $table->unique(['image_id', 'imagegable_id', 'imagegable_type']);
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
        Schema::dropIfExists('Imagegables');
    }
}
