<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulemessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedulemessages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->nullable();
            $table->longText("message")->nullable();
            $table->string("message_type")->nullable();
            $table->dateTime("message_datetime")->nullable();
            $table->longText('UUID')->nullable();;
            $table->string('status')->nullable();;
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
        Schema::dropIfExists('schedulemessages');
    }
}
