<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slot_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('slot_id')->unsigned();
            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade');
            $table->bigInteger('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('food_items')->onDelete('cascade');
            $table->string('quantity',3,2);
            $table->decimal('amount',5,2);
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
        Schema::dropIfExists('slot_items');
    }
}
