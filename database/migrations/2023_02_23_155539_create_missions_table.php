<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mission', function (Blueprint $table) {
            $table->bigInteger('mission_id')->unsigned()->autoIncrement();
            $table->bigInteger('theme_id')->unsigned();
            $table->foreign('theme_id')->references('mission_theme_id')->on('mission_theme');
            $table->bigInteger('city_id')->unsigned();
            $table->foreign('city_id')->references('city_id')->on('city');
            $table->bigInteger('country_id')->unsigned();
            $table->foreign('country_id')->references('country_id')->on('country');
            $table->string('title',128);
            $table->text('short_description');
            $table->text('description')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->enum('mission_type',['TIME','GOAL']);
            $table->enum('status',['0','1'])->default('0');
            $table->string('organization_name')->nullable();
            $table->text('organization_detail')->nullable();
            $table->enum('availability',['daily','weekly','weekend','monthly'])->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mission');
    }
};