<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CoinManagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function (Blueprint $table) {
            $table->string('tag')->default('user');
        });

        Schema::create('user_info', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('phone')->unique();
            $table->string('nric')->unique();
            $table->string('nu_member');
            $table->string('interested_quantity')->nullable();
            $table->text('email_array')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('coin_account', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->double('initial_coin');
            $table->double('balance');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('coin_holder', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number')->unique();//uuid (string) Str::uuid();
            $table->integer('seller_id');//link to users
            $table->integer('buyer_id');//link to users
            $table->double('amount_purchased');
            $table->double('coin_quantity');
            $table->timestamps();
            $table->softDeletes();
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
            $table->dropColumn('tag');
        });
        Schema::dropIfExists('user_info');
        Schema::dropIfExists('coin_account');
        Schema::dropIfExists('coin_holder');
    }
}
