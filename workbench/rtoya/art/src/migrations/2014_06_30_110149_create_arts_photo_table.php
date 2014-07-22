<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtsPhotoTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arts_photo', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('art_id');
            $table->integer('user_id');
            $table->string('path', 80);
            $table->timestamps();
            $table->index('art_id');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('arts_photo');
    }

}
