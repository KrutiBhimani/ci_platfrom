<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_invite', function (Blueprint $table) {
            $table->bigInteger('mission_invite_id')->unsigned()->autoIncrement();
            $table->bigInteger('mission_id')->unsigned();
            $table->foreign('mission_id')->references('mission_id')->on('mission');
            $table->bigInteger('from_user_id')->unsigned();
            $table->foreign('from_user_id')->references('user_id')->on('user');
            $table->bigInteger('to_user_id')->unsigned();
            $table->foreign('to_user_id')->references('user_id')->on('user');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mission_invite');
    }
};
