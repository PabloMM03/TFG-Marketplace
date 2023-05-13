<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Table orders to pay and its methods
        Schema::create('orders', function (Blueprint $table) {

            $table->id();
            // $table->unsignedBigInteger('user_id');
            $table->string('shipping_fname');
            $table->string('shipping_lname');
            $table->string('email');
            $table->string('order_number');
            $table->enum('status', ['pending', 'processing', 'completed', 'decline'])->default('pending'); //Payment process
            $table->boolean('is_paid')->default(true); //If paid
            $table->enum('payment_method', ['cash_on_delivery', 'paypal', 'stripe', 'card'])->default('cash_on_delivery'); // Payment method


            //Fill Form fields

            $table->string('shipping_address1');
            $table->string('shipping_address2');
            $table->string('shipping_city');
            $table->string('shipping_state');
            $table->string('shipping_zipcode');
            $table->string('shipping_phone');

            
            //notas
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
