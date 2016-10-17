<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_websites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('bannerBg');
            $table->string('subTextBtn');
            $table->string('bannerMsg');
            $table->string('switchHrefText');
            $table->string('switchHref');
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
        Schema::drop('data_websites');
    }
}
