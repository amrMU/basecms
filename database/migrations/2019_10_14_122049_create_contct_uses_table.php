<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContctUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contctus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('');
            $table->string('subject')->default('');
            $table->string('email')->default('');
            $table->enum('read',['0','1'])->default('0');
            $table->enum('reply',['0','1'])->default('0');
            $table->longText('message');
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
        Schema::dropIfExists('contctus');
    }
}
