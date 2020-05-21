<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderCardInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('order_card_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('token_id');
            $table->text('address')->nullable();
            $table->text('created');
            $table->text('exp_month');
            $table->text('exp_year');
            $table->text('country')->nullable();
            $table->text('brand')->nullable();
            $table->text('last4');
            $table->integer('user_id');
            $table->integer('company_id');
            $table->boolean('is_delivered');
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
