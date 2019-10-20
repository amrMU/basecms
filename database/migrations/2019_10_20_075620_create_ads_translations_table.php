<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ad_id');
            $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');
            $table->enum('language',['ar','en']);
            $table->string('title')->nullabe();
            $table->string('address')->nullabe();
            $table->longText('content');
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
        Schema::dropIfExists('ads_translations');
    }
}
