<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMosqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mosque', function (Blueprint $table) {
            $table->id();
            $table->string("mosque_name")->nullable();
            $table->longText("mosque_image")->nullable();;
            $table->string("latitude")->nullable();;
            $table->string("longitude")->nullable();;
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
        Schema::dropIfExists('mosque');
    }
}
