<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {

            $table->string('joystick')->after('product_id')->nullable();
            $table->string('other_prod_1')->after('joystick')->nullable();
            $table->string('other_prod_2')->after('other_prod_1')->nullable();
            $table->string('deliverer')->after('other_prod_2')->nullable();
            $table->string('comment')->after('deliverer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            //
        });
    }
}
