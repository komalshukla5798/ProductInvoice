<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('date');
            $table->integer('extra_seats')->nullable();
            $table->decimal('discount', 5, 2)->nullable();
            $table->decimal('extra_seat_tax', 5, 2)->nullable();
            $table->decimal('extra_seat_charge', 8, 2)->nullable(); 
            $table->decimal('net_amount', 8, 2); 
            $table->decimal('total_amount', 8, 2); 
            $table->integer('guests');
            $table->tinyInteger('status');
            // $table->bigInteger("day_id")->unsigned();
            // $table->foreign('day_id')->references('id')->on('slots')->onDelete('cascade');
            // $table->string('booked_slots');
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
        Schema::dropIfExists('bookings');
    }
}
