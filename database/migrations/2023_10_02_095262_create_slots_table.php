<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('booking_id')->unsigned();
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->bigInteger('table_id')->unsigned();
            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');
            $table->string('booked_slots');
            $table->string('duration');
            $table->string('statement')->nullable();
            $table->decimal('stay_disc', 5, 2)->nullable(); 
            $table->decimal('stay_charge', 5, 2)->nullable(); 
            $table->decimal('gross_amount', 8, 2); 
            $table->decimal('tax_amount', 8, 2); 
            $table->decimal('net_amount', 8, 2); 
            $table->decimal('add_amount', 8, 2)->nullable(); 
            $table->decimal('minus_amount', 8, 2)->nullable();
            $table->decimal('total_amount', 8, 2);
            $table->decimal('tip', 8, 2)->nullable();
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
        Schema::dropIfExists('slots');
    }
}
