<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserInfoColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_info', function (Blueprint $table) {
            $table->date('dob')->nullable();
            $table->string("gender")->nullable();
            $table->string('occupation')->nullable();
            $table->string('income')->nullable();
            $table->string('country')->default("indonesia");
            $table->string('state')->nullable();
            $table->string('others_residency')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_info', function (Blueprint $table) {
            $table->dropColumn('dob');
            $table->dropColumn("gender");
            $table->dropColumn('occupation');
            $table->dropColumn('income');
            $table->dropColumn('country');
            $table->dropColumn('state');
            $table->dropColumn('others_residency');
        });
    }
}
