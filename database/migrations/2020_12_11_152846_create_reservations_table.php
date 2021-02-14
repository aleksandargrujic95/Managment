<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('date_of_rent', 6);
            $table->timestamp('date_of_return', 6);
            $table->float('price');
            $table->boolean('active');           
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onCascade('delete');

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onCascade('delete');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
