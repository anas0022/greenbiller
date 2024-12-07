<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("subscription", function (Blueprint $table) {

            $table->id();
            $table->integer("duration");
            $table->date("date");
            $table->integer("store_count");
            $table->integer("rate");
            $table->string("note");
    });}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("subscription");
    }
}
