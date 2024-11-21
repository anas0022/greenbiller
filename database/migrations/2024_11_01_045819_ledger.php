<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ledger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('ledger', function(Blueprint $table){

        $table->id();
        $table->integer('customer_id');
        $table->integer('supplyer_id');
        $table->string('date');
        $table->string('title');
        $table->string('type');
        $table->string('invoice_purchase_no');
        $table->string('debit');
        $table->string('credit');
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
        //
    }
}
