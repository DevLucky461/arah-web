<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->nullable();
            $table->string("user_type")->nullable();
            $table->longText("UUID")->nullable();
            $table->timestamps();
        });

        Schema::create('rooms_info', function (Blueprint $table) {
            $table->id();
            $table->longText("UUID")->nullable();
            $table->longText("group_image")->nullable();
            $table->string("group_name")->nullable();
            $table->string("group_type")->nullable();
            $table->text("group_description")->nullable(); // personal, group, communit
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
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('rooms_info');
    }
}
