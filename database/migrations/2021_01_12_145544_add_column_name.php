<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->longText("image")->nullable();
            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
        });

        Schema::table('user_info', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('nric')->nullable()->change();
            $table->string('nu_member')->nullable()->change();
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
