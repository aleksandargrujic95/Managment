<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jbk')->default('/');
            $table->string('konzola')->default('/');
            $table->string('opstina')->default('/');
            $table->string('address')->default('/');
            $table->string('name')->default('No Name');
            $table->string('phone_number')->default('00000000000');
            $table->integer('number_of_rent')->default(0);
            $table->decimal('money_spent')->default(0);
            $table->string('comment')->default('/');
            $table->string('reservations')->default('');
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
        Schema::dropIfExists('customers');
    }
}
