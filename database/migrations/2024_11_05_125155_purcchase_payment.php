<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PurcchasePayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_payments', function(Blueprint $table){

            $table->id();
            $table->string('count_id')->nullable();
            $table->string('payment_code')->nullable();
            $table->string('store_id')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_note')->nullable();

            $table->string('change_return')->nullable();
            $table->string('account_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('payment')->nullable();
            $table->string('short_code')->nullable();
            
            $table->string('cheque_period')->nullable();
            $table->string('cheque_status')->nullable();

            $table->string('advanced_adjustment')->nullable();
            $table->string('cheque_number')->nullable();
            $table->string('status')->nullable();
            $table->string('created_by')->nullable();
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
