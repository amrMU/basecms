<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('price')->nullable();
            $table->string('url')->nullable();
            $table->longText('map');
            $table->string('meta_tags')->nullable();
            $table->enum('status',['show','hide']);
            $table->enum('type_ad',['own','rent','purchase']);
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('aboutus')->onDelete('cascade');
            $table->string('space')->nullabe();
            $table->string('bed_room')->nullabe();
            $table->string('bathroom')->nullabe();
            $table->string('parking')->nullabe();
            $table->softDeletes();
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
        Schema::dropIfExists('ads');
    }
}
