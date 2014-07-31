<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersMetaTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_meta', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')
                ->unsigned();
            $table->string('website_url', 120);
            $table->string('facebook_url', 120);
            $table->string('twitter', 30);
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
        Schema::drop('users_meta');
    }

}
