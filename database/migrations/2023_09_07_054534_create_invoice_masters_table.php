<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Invoice_Master', function (Blueprint $table) {
            $table->bigIncrements('Invoice_Id');
            $table->integer('Invoice_no');
            $table->date('Invoice_Date');
            $table->string('CustomerName');
            $table->decimal('TotalAmount', 10, 2);
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
        Schema::dropIfExists('Invoice_Master');
    }
}
