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
        Schema::create('story_invite', function (Blueprint $table) {
            $table->bigInteger('story_invite_id')->unsigned()->autoIncrement();
            $table->bigInteger('story_id')->unsigned();
            $table->foreign('story_id')->references('story_id')->on('story');
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
        Schema::dropIfExists('story_invite');
    }
};