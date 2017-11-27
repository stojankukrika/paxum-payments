<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Payments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('amount' , 10,2)->nullable()->default(null);
            $table->string('email')->nullable()->default(null);;
            $table->string('currency')->nullable()->default(null);;
            $table->string('method');
            $table->string('response_code');
            $table->string('response_description')->nullable()->default(null);
            $table->decimal('response_fee' , 10,2)->nullable()->default(null);
            $table->unsignedInteger('response_transaction_id')->nullable()->default(null);
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payments');
    }
}
